from fastapi import FastAPI, Request
from fastapi.middleware.cors import CORSMiddleware
from fastapi.responses import HTMLResponse
from fastapi.staticfiles import StaticFiles
from fastapi.templating import Jinja2Templates
import scraping

app = FastAPI()
app.mount("/static", StaticFiles(directory="./static"), name="static")


templates = Jinja2Templates(directory="./static")


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
    return templates.TemplateResponse("index.html",{"request":request})
@app.get("/panorama", response_class=HTMLResponse)
async def panoramaRoute(request:Request):
    return templates.TemplateResponse("index.html",{"request":request})