import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="nivelessat"
)

# función sin parámetros o retorno de valores
def ver_total_equipos():
  mycursor = mydb.cursor()

  mycursor.execute("SELECT * FROM equipos WHERE estado=1")

  myresult = mycursor.fetchall()

  for x in myresult:
    print(x)

ver_total_equipos()
