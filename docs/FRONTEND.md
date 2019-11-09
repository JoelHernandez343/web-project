# ¿Cómo trabajar con el FrontEnd?

:warning: Si trabajas en la parte del FrontEnd, es **importante** que sólo trabajes en `./frontend/`

## Estructura del folder
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