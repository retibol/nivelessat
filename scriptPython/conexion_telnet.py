import telnetlib
response = ''
HOST = '192.168.1.201'
PORT = 3389
tn = telnetlib.Telnet()
try:
    tn.open(HOST, PORT, 3)
    response = '2'
except Exception:
    response = '0'
finally:
    tn.close()
    print(response)