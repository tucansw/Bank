@ECHO OFF

CLS
REM ------------------------------------------------------------

REM Name:  install.bat

REM Autor: Hartmut Karrasch

REM Datum: 4.9.2005

REM ------------------------------------------------------------


ECHO Starting WeLOAD ...
start weload-start.exe
cd apache
cd htdocs
cd weload
start start.htm
EXIT
