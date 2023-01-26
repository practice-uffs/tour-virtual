import gspread
import pandas as pd
import re
from markdown import markdown

class GoogleDriveLinkParser:

    @staticmethod
    def getHashLink(string:str) -> str:
        result = string.split("/")
        hash = ""
        for i in result:
            if len(i) > len(hash): # Func Max não funcionou :(
                hash = i

        for i in result:
            if re.search("[d-dD-D][r-rR-R][i-iI-I][v-vV-V][e-eE-E][.][g-gG-G][o-oO-O][o-oO-O][g-gG-G][l-lL-L][e-eE-E]", i): # Verifica link Google Drive
                for j in result:
                    if re.search("[f-fF-F][i-iI-I][l-lL-L][e-eE-E]", j): # Verifica se ainda não foi modificada
                        return "https://drive.google.com/uc?id=" + hash + '"'
                else:
                    return string
        return string


    @staticmethod
    def getLink(string:str):
        # Procura os links
        result = re.findall("(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})", string)
        for i in result:
            string = string.replace(i, GoogleDriveLinkParser.getHashLink(i))
        return string

def getData(shname: str, worksheetname: str):
    sa = gspread.service_account(filename='../env/keys.json')  # Chaves
    sh = sa.open(shname)

    wks = sh.worksheet(worksheetname)  # Nome da folha da planilha
    dataframe = pd.DataFrame(wks.get_all_records())
    # -----------------------------------------
    data: dict = {}
    contador: int = 0
    for valor in dataframe.values:
        temp: dict = {}
        for index_column in range(len(dataframe.columns)):
            if dataframe.columns[index_column] == 'descricao':
                markdown_parse = markdown(valor[index_column])
                link_parse = GoogleDriveLinkParser.getLink(markdown_parse)
                if link_parse:
                    temp[dataframe.columns[index_column]] = link_parse
                else:
                    temp[dataframe.columns[index_column]] = markdown_parse

            else:
                temp[dataframe.columns[index_column]] = valor[index_column]
            
        data[contador] = temp
        contador += 1

    return data

if __name__ == "__main__":
    getData('Laranjeiras do Sul', 'Geral')