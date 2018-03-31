import csv
import numpy as np
from sklearn import linear_model
import matplotlib.pyplot as plt
x=[]
y=[]
for i in range(2005,2016):
    x.append(i)

def get_data(filename):
    with open(filename,'r') as csvfile:
        csvFileReader = list(csv.reader(csvfile))
        #next(csvFileReader)
        for j in range(49,60):
            y.append(csvFileReader[108][j])
    return

def predict_pp(x,y,z):
    linear_mod = linear_model.LinearRegression()
    x = np.reshape(x,(len(x),1))
    y = np.reshape(y,(len(y),1))
    linear_mod.fit(x,y)
    predicted_pop = linear_mod.predict(z)
    return predicted_pop[0][0]#linear_mod.coef_[0][0],linear_mod.intercept_[0]

    
get_data('fulldata1.csv')
print(x)
print(y)
print("\n")

for i in range(2016,2020):
    y.append(predict_pp(x,y,i))    #, coefficient, constant 
    x.append(i)
print(x)
print(y)
#print(str(predicted_pp))
#print(str(coefficient))
#print(str(constant))
