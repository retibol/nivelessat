import time

ahora = time.strftime("%c")
## representacion de fecha y hora
print ("Fecha y hora " + time.strftime("%c"))

## representacion del tiempo
print ("Fecha "  + time.strftime("%x"))

## representacion de la hora
print ("Hora " + time.strftime("%X"))


import datetime

x = datetime.datetime.now()

print ("Fecha y hora = %s" % x)

print ("Fecha y hora en formato ISO = %s" % x.isoformat() )

print (u"Año = %s" %x.year)

print ("Mes = %s" %x.month)

print ("Dia =  %s" %x.day)

print ("Formato dd/mm/yyyy =  %s/%s/%s" % (x.day, x.month, x.year) )

print ("Hora = %s" %x.hour)

print ("Minutos = %s" %x.minute)

print ("Segundos =  %s" %x.second)

print ("Formato hh:mm:ss = %s:%s:%s" % (x.hour, x.month, x.second) )

time.sleep(10)

a= int(x.second)
y = datetime.datetime.now()
b= int(y.second)


c = b - a

print ("Minutos perdidos = %s " %c)
