################################################
#               PROGRAMA PRINCIPAL
################################################
# Importamos las funciones propias
import modulo_fun

# Importamos las funciones de la base de datos
import modulo_db
import time

#Importamos las funciones del modulo de red
#import modulo_red

#registraMadida(3.878, 2)
import datetime

ipValidos = modulo_db.ipEquiposActivos()
print("------INICIO DE MEDIDAS---------")
linea="#\t\t\t\t"
for x in ipValidos:
    linea=linea+x[1]+"\t"
print(linea)

linea="#\t\t\t\t"
for x in ipValidos:
    linea=linea+x[2]+"\t"
linea=linea+"\t"+"segundos"
print(linea)
i=0
#x[0] = id del equipo
#x[1] = nombre del  equipo
#x[2] = ip del  equipo
#x[3] = valor minimo del equipo
#x[4] = valor maximo del  equipo

idEquipo = x[0]
#for i in range(30):
while 1:
    #print(str(i) + "---- Medida------")

    z = datetime.datetime.now()
    
    #print ("Fecha y hora = %s" % x)
    i = i + 1
    linea=str(z)+"\t"    
    for x in ipValidos:
        #print(x[1])
        idEquipo = x[0]
        val_min = x[3]
        val_max = x[4]
        medida=modulo_fun.extrae_medida(x[2])
        if medida == 0.0:
            medida=modulo_fun.extrae_medida(x[2])
            if medida == 0.0:
                medida=modulo_fun.extrae_medida(x[2])
                if medida == 0.0:
                    medida=modulo_fun.extrae_medida(x[2])                
        linea=linea+str(medida)+"\t\t"
        modulo_db.guardaMedidaxId(x[0],medida)              # Guarda la medida en la base de datos
        modulo_db.insertaAlarma(idEquipo)                   # Guarda la alarma que geneta la medida
        
        
                
            

    y = datetime.datetime.now()
    a = int(z.second)
    b = int(y.second)
    c = b - a
    if c < 0:
        c = 60 + c 
    linea = linea + "\t" + str(c)
    print(linea)

  #modulo_db.registraMadida(3.878, 2)
