@ECHO OFF

CLS
REM ------------------------------------------------------------

REM Name:  install.bat

REM Autor: Hartmut Karrasch

REM Datum: 4.9.2005

REM ------------------------------------------------------------


ECHO Cleaninig logfiles ...
cd apache
cd logs
del access.log
del error.log
cd ..
cd tmp
del sess*.*
echo Log- and Session-Files deleted!
cd ..
cd ..
PAUSE
echo Logfiles cleaned
EXIT
