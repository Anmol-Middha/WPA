from flask import Flask, render_template
import csv
import numpy as np
from sklearn import linear_model
import matplotlib.pyplot as plt

app = Flask(__name__)


@app.route('/')
def hello_world():
   x=[]
   y=[]
   for i in range(1960,2017):
       x.append(i)
       country = "India"
       with open('fulldata.csv','r') as csvfile:
           csvFileReader = list(csv.reader(csvfile))
           for i in range(1,265):
               if(country==(csvFileReader[i][1])):
                   for j in range(4,61):
                       y.append(csvFileReader[i][j])
                       a = x
                       b = y
                       linear_mod = linear_model.LinearRegression()
                       x = np.reshape(x,(len(x),1))
                       y = np.reshape(y,(len(y),1))
                       linear_mod.fit(x,y)
                       for i in range(2017,2020):
                           predict = linear_mod.predict(i)
                           b.append(str(predict[0][0]))     
                           a.append(str(i))
                           print(a)
                            print(b)

if __name__ == "__main__":
    app.run()