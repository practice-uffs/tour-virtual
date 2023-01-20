from fastapi import FastAPI, Request
from fastapi.middleware.cors import CORSMiddleware
from fastapi.responses import HTMLResponse
from fastapi.staticfiles import StaticFiles
from fastapi.templating import Jinja2Templates
import scraping

app = FastAPI()
app.mount("/static", StaticFiles(directory="./static"), name="static")


map = Jinja2Templates(directory="./static/map/templates")
panorama = Jinja2Templates(directory="./static/panorama")


origins = ["*"]

app.add_middleware(
    CORSMiddleware,
    allow_origins=origins,
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)


@app.get("/",response_class=HTMLResponse)

async def root(request:Request):
    atributos = scraping.getData("Laranjeiras do Sul","Geral")
    return map.TemplateResponse("content.html",{"request":request, "atributos": atributos})
@app.get("/panorama", response_class=HTMLResponse)
async def panoramaRoute(request:Request):
    return panorama.TemplateResponse("index.html",{"request":request})