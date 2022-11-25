from flask import Flask
from flask import render_template

app = Flask(__name__)



@app.route('/')
def mapa():
    return render_template('index.html')


@app.route('/panorama/')
def image_360():
    return render_template('panorama/panorama.html')


if __name__ == '__main__':
    app.run()
