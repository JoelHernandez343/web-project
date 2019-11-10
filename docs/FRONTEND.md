# ¿Cómo trabajar con el FrontEnd?

:warning: Si trabajas en la parte del FrontEnd, es **importante** que sólo trabajes en `./frontend/`

## Índice
- [¿Cómo trabajaremos?](#¿cómo-trabajaremos?)
- [Instalando Prepros](#Instalando-Prepros)
    - [Instalando Prepros en Linux](#Instalando-Prepros-en-Linux)
- [Aprendiendo Pug](#Aprendiendo-Pug)
- [Estructura del proyecto](#estructura-del-proyecto)
- [Trabajando](#trabajando)

## ¿Cómo trabajaremos?
Para la parte del Frontend, se ha decidido utilizar `Pug` para la generación del `HTML`, el cual es un preprocesador que permite escribir de una forma más sencilla `HTML`, incluso permite crear plantillas y bloques de código reutilizables (**mixins**), además de poder programar mediante instrucciones `JavaScript`.

Como no podemos utilizar `JavaScript` en el BackEnd (viva `PHP`), los que harán las vistas necesitarán un servidor que les compile el código que se haga en `Pug`. Para esto utilizaremos `Prepros`, que es una aplicación que monta un servidor local que puede compilar `Pug`, además de que tiene LiveView o _hot reaload_, lo que te permite ver los cambios que hagas en las vistas **inmediatamente** en el navegador.

## Instalando Prepros
Es necesario que se descargue instale la versión número 6 de `Prepros`, pues la configuración de las carpetas está diseñada para esa versión.

Pueden descargar `Prepros` desde [aquí](https://prepros.io/).

### Instalando Prepros en Linux
- Descargar el paquete `.deb`
- En la carpeta donde hayas descargado el paquete, ejecuta:
```ssh
sudo apt install <nombre_del_paquete>.deb
```

## Aprendiendo Pug
Consulta la [guía rápida](PUG.md) para que te familiarices con `Pug`.

## Estructura del proyecto
```ssh
frontend
├── build
│   └── // Archivos HTML resultantes
├── css
│   ├── main.css // Nuestro css
│   └── materialize.min.css
├── images
|   └── // Imágenes a usar
├── js
│   ├── jquery-3.4.1.min.js
│   ├── main.js // Nuestro js
│   └── materialize.min.js
├── prepros-6.config
└── views 
    ├── // Vistas hechas en pug
    ├── index.pug
    ├── layouts // Clases que se pueden extender
    │   └── _home.pug
    └── mixins // Bloques reutilizables
        ├── _content.pug
        └── _p.pug
```

- `build`: Carpeta generada por Prepros donde se guardan las vistas renderizadas presentes en  `views`.
- `css`: Carpeta de estilos.
- `images`: Carpeta de imágenes.
- `js`: Carpeta de JavaScript.
- `views`: Los archivos que son **hijos directos** de esta carpeta son los que se renderizarán en `build`
    - `layouts`: Clases extendibles de **Pug**, puedes crear las que necesites. _No se renderizarán._
    - `mixins`: Bloques de código de **Pug** que se pueden usar dentro de cualquier otro archivo. _No se renderizarán._
- `prepros-6.config`: Configuración de Prepros 6 para que lo de arriba no se rompa :trollface:

## Trabajando
- Agrega la carpeta frontend a Prepros
- Inicia LivePreview ([Ayuda aquí](https://prepros.io/help/live-preview)).
- Las vistas deben ser creadas directamente en `views/`.
- Las _plantillas_ que quieras crear, van en `layouts`:
    - Los nombres de las _plantillas_ deben de ir con un `_` antes del nombre, por ejemplo, si queremos crear la plantilla alumnos, el nombre debe ser `_alumnos.pug`.
- Los _mixins_ que quieras crear deben de ir en `mixins`:
    - Los nombres de las _mixins_ deben de ir con un `_` antes del nombre, por ejemplo, si queremos crear el mixin footer, el nombre debe ser `_footer.pug`
