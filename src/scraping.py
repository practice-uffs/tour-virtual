import gspread
import pandas as pd




def find_item(value:str) -> list:
    ...



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
            list_group:list = []
            if dataframe.columns[index_column] == 'descricao':

                print(valor[index_column].split("(item)[]"))


            temp[dataframe.columns[index_column]] = valor[index_column]
            
        data[contador] = temp
        contador += 1

    return data

if __name__ == "__main__":
    getData('Laranjeiras do Sul', 'Geral')