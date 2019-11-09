# Git guide

Guía de configuración y comandos de Git y GitHub

## Índice
- [Instalación](#instalación)
    - [Windows](#windows)
    - [Linux](#linux)
    - [Mac](#mac)
- [Configuración inicial](#configuración-básica)
- [Clonando el repositorio](#clonando-el-repositorio)
- [Subiendo tus cambios al repositorio](#subiendo-tus-cambios-al-repositorio)

## Instalación
### Windows
- Descargar instalador ([here](https://git-scm.com/download/win))
- Abrir el instalador y prácticamente dar *siguiente* y *siguiente*, a menos que quieran otra configuración.
    - Recomendado usar Code para el editor de texto por defecto
    - Recomendado usar la opción *Git from the command line and also from 3rd-party software*
    ![Windows PATH environment](docs/win01.png)

### Linux
- Si no lo tienes aun instalado (Debian/Ubuntu)
```ssh
sudo apt install git
```
- Para otras distros, instrucciones [aquí](https://git-scm.com/download/linux)

### Mac
- Lista de instrucciones [aquí](https://hackernoon.com/install-git-on-mac-a884f0c9d32c)

## Configuración básica
- Crear una [cuenta en GitHub](https://github.com/)
- Configurar con tu *nombre de usuario* y *correo* desde la terminal o desde Git Bash (Windows)
```ssh
git config --global user.name "Tu nombre aquí"
git config --global user.email "tu_correo@correo.com"
```
- (Opcional) Colores en git:
```
git config --global color.ui true
```
- (Opcional) Editor de tu preferencia (Windows desde el instalador te lo configura)
```
git config --global core.editor code
```

## Clonando el repositorio


## Subiendo tus cambios al repositorio
