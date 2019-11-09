# ¿Cómo trabajar con el FrontEnd?

:warning: Si trabajas en la parte del FrontEnd, es **importante** que sólo trabajes en `./frontend/`

## Índice
- [Estructura del folder](#estructura-del-folder)
- [Trabajando](#trabajando)
- [¿Ayuda?](#¿ayuda?)

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

## Trabajando
- Instala [Prepros 6](https://prepros.io/) si aun no lo tienes instalado. (Importante que sea la versión 6).
- Agrega la carpeta frontend a Prepros
- Inicia LivePreview ([Ayuda aquí](https://prepros.io/help/live-preview)).
- Las vistas deben ser creadas directamente en `views/`.
- Las _plantillas_ que quieras crear, van en `layouts`:
    - Los nombres de las _plantillas_ deben de ir con un `_` antes del nombre, por ejemplo, si queremos crear la plantilla alumnos, el nombre debe ser `_alumnos.pug`.
- Los _mixins_ que quieras crear deben de ir en `mixins`:
    - Los nombres de las _mixins_ deben de ir con un `_` antes del nombre, por ejemplo, si queremos crear eñ mixin footer, el nombre debe ser `_footer.pug`
## ¿Ayuda?
- Más sobre `mixins` y `layouts` [aquí](https://www.sitepoint.com/a-beginners-guide-to-pug/)
- En desarrollo...