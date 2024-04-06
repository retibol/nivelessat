from pythonping import ping

#lista = ping('18.8.8.8')

import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="nivelessat"
)

mycursor = mydb.cursor()

mycursor.execute("SELECT id, nombre, ip FROM equipos")

myresult = mycursor.fetchall()

for x in myresult:
  #print(x[2])
  server=x[2]
  id=x[0]
#server='8.8.8.8'
  response_list = ping(server)
  #print(response_list.rtt_avg_ms)
  if response_list.success():
     print(server," OK")
     estado=1
  else:
     print(server," NOK")
     estado=0

  sql = "UPDATE equipos SET estado =" + str(estado) + " WHERE id =" + str(id)
  print(sql)
  mycursor.execute(sql)

  mydb.commit()

  print(mycursor.rowcount, "record(s) affected")
