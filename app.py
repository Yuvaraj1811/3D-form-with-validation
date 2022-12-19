
from flask import Flask,render_template,request,session, abort,send_file,send_from_directory,redirect,url_for,make_response,jsonify
import io; 
import csv
import selenium
from selenium import webdriver
import time
import os
import re
import random
from selenium.webdriver.common.keys import Keys
from selenium.common.exceptions import NoSuchElementException
import pandas as pd
from selenium.webdriver.chrome.options import Options
import threading
from multiprocessing import Process
from threading import Thread
import mysql.connector
import datetime
from datetime import datetime

def mysqlfunction():
    mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="sample"
)

    return mydb

app = Flask(__name__)
app.secret_key = 'yuvaraj2412' 
@app.route('/',methods=["POST","GET"])
def home():
    return render_template("index.php")

@app.route('/db',methods=["POST","GET"])
def db():
    message=''
    if request.method=="POST":
        data1=request.get_json()
        print("data : ",data1)
        firstname=data1['firstname']
        print(firstname)
        lastname=data1['lastname']
        email=data1['email']
        phone=data1['phone']
        password=data1['password']
        print(firstname,lastname,email,phone,password)
        mydb=mysqlfunction()
        mycursor=mydb.cursor()
        # if email:
        #     sql="SELECT email FROM cube where email=%s"
        #     value=[(email)]
        #     mycursor.execute(sql,value)
        #     email=mycursor.fetchone()
        #     print(email)
        #     if email:
        #         message="Email-Id Already exist"
        #         print(message)
        # else:
        status="new"
        sql="INSERT INTO cube(firstname,lastname,email,phone,password,status) VALUES(%s,%s,%s,%s,%s,%s)"
        val=(firstname,lastname,email,phone,password,status)
        mycursor.execute(sql,val)
        mydb.commit()
        mydb.close()
        message="Succesfully registered"
        return render_template("index.php",message=message)



@app.route('/email1',methods=["POST","GET"])
def email1():
    error=''
    if request.method=='POST':
        data=request.get_json()
        print("data : ",data['email'])
        finalemail=data['email']
        mydb=mysqlfunction()
        mycursor=mydb.cursor()
        sql="SELECT email FROM cube where email=%s"
        val=[(finalemail)]
        mycursor.execute(sql,val)
        result=mycursor.fetchone()
        print(result)
        if result:
            error="Email Id already exists"
            print(error)
        else:
            pass
            # val=(finalemail)
            # mycursor.execute(sql,val)
            # mydb.commit()
    # return render_template(result=result)
    return {"error":error}

@app.route('/update',methods=["POST","GET"])
def update():
    message=''
    if request.method=='POST':
        data=request.get_json()
        email=data["email"]
        password=data["password"]
        print(email,password)
        mydb=mysqlfunction()
        mycursor=mydb.cursor()
        sql="SELECT email FROM cube where email=%s"
        val=[(email)]
        mycursor.execute(sql,val)
        result=mycursor.fetchone()   
        mydb.close()
        print(result)
        
        if result:
            print("True")
            mydb=mysqlfunction()
            mycursor1=mydb.cursor()
            sql="UPDATE `cube` SET`password`='"+password+"' WHERE `email`='"+email+"'" 
            # val1=(password,email)
            # mycursor.execute(sql1,val1)
            mycursor1.execute(sql)
            mydb.commit()
            mydb.close()
            message="Successfully updated"
            print(message)
        else:
            message="Emal-ID doesn't  exist"
    return {"message":message}





@app.route('/login' ,  methods =['GET', 'POST'])
def login():
    msg=""
    if request.method=='POST':
        # data=request.get_json()
        # login_email=data["email"]
        # login_pswd=data["password"]
        login_email=request.form.get("name")
        login_pswd=request.form.get("password")

        print(login_email)
        mydb=mysqlfunction()
        mycursor=mydb.cursor()
        sql="SELECT * FROM cube WHERE email=%s AND password=%s"
        val=(login_email,login_pswd)
        mycursor.execute(sql,val)
        result=mycursor.fetchone()
        mydb.close()
        print(result)
        if result:
            print("In if conditon")
            # session['loggedin'] = True
            session['email'] = result[3]
            print("session email ",session['email'])
            # msg = 'Logged in successfully !'
            return redirect(url_for("dashboard"))
        else:
            msg = 'Incorrect username / password !'
            return render_template("index.php",msg=msg)
    return render_template("index.php",msg=msg)

@app.route('/dashboard', methods =['GET', 'POST'])
def dashboard():
    if "email" in session:
        print("email session" ,session["email"])
        print("hello")
        mydb=mysqlfunction()
        mycursor=mydb.cursor()
        status="new"
        sql="SELECT * FROM cube where status = 'new';"
        mycursor.execute(sql)
        results=mycursor.fetchall()
        mydb.commit()
        mycursor.close()
        print(results)
        return render_template('dashboard.php',results=results)
    else:
        return render_template("index.php")



@app.route('/logout')
def logout():
    session.pop('loggedin', None)
    session.pop('email', None)
    return redirect(url_for('login'))
            

@app.route('/accept',methods=["POST","GET"])
def accept():
    message=""
    if "email" in session:  
        if request.method=='POST':
            data=request.get_json()
            email=data["email"]
            print("email : ",email)
            mydb=mysqlfunction()
            mycursor=mydb.cursor()
            status="accepted"
            sql="UPDATE `cube` SET `status`='"+status+"' WHERE `email`='"+email+"'"
            mycursor.execute(sql)
            mydb.commit()
            # mydb.close()
            message="Successfully updated"
            print(message)
            return redirect(url_for('dashboard'))
        else:
            return jsonify({"error"})
    else:
        return render_template("index.php")



@app.route('/acceptdashbaord',methods =['GET', 'POST'])
def acceptdashbaord():
    mydb=mysqlfunction()
    mycursor=mydb.cursor()
    status="accepted"
    sql="SELECT * FROM cube where status = 'accepted';"
    mycursor.execute(sql)
    result1=mycursor.fetchall()
    # mydb.commit()
    mydb.close()
    print(result1)
    return render_template("accept.php",result1=result1)


@app.route('/reject',methods=["POST","GET"])
def reject():
    message=""
    if request.method=='POST':
        data=request.get_json()
        email=data["email"]
        print("email : ",email)
        mydb=mysqlfunction()
        mycursor=mydb.cursor()
        status="rejected"
        sql="UPDATE `cube` SET `status`='"+status+"' WHERE `email`='"+email+"'"
        mycursor.execute(sql)
        mydb.commit()
        # mydb.close()
        message="Successfully updated"
        print(message)
        return render_template("dashboard.php")
        # return redirect(url_for('dashboard'))
    else:
        return jsonify({"error"})

@app.route('/rejectdashbaord',methods =['GET', 'POST'])
def rejectdashbaord():
    mydb=mysqlfunction()
    mycursor=mydb.cursor()
    status="rejected"
    sql="SELECT * FROM cube where status = 'rejected';"
    mycursor.execute(sql)
    result2=mycursor.fetchall()
    # mydb.commit()
    mydb.close()
    print(result2)
    return render_template("reject.php",result2=result2)


@app.route('/delete',methods=["POST","GET"])
def delete():
    message=""
    if request.method=='POST':
        data=request.get_json()
        email=data["email"]
        print("email : ",email)
        mydb=mysqlfunction()
        mycursor=mydb.cursor()
        status="deleted"
        sql="UPDATE `cube` SET `status`='"+status+"' WHERE `email`='"+email+"'"
        mycursor.execute(sql)
        mydb.commit()
        # mydb.close()
        message="Successfully updated"
        print(message)
        return redirect(url_for('dashboard'))
    else:
        return jsonify({"error"})


@app.route('/deletedashbaord',methods =['GET', 'POST'])
def deletedashbaord():
    mydb=mysqlfunction()
    mycursor=mydb.cursor()
    status="deleted"
    sql="SELECT * FROM cube where status = 'deleted';"
    mycursor.execute(sql)
    result3=mycursor.fetchall()
    # mydb.commit()
    mydb.close()
    print(result3)
    return render_template("delete.php",result3=result3)
if __name__ == "__main__":
   app.run(debug=True,port=8081)


