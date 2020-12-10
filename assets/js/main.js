'use stric'
$(document).ready(function () {
    var dep = $("#departamento");
    var muni = $("#ciudad");
    var departamentos = {
        'Amazonas': 'Amazonas',
        'Antioquia': 'Antioquia',
        'Arauca': 'Arauca',
        'Atlantico': 'Atlántico',
        'Bolívar': 'Bolívar',
        'Boyaca': 'Boyacá',
        'Caldas': 'Caldas',
        'Caqueta': 'Caquetá',
        'Casanare': 'Casanare',
        'Cauca': 'Cauca',
        'Cesar': 'Cesar',
        'Choco': 'Chocó',
        'Córdoba': 'Córdoba',
        'Cundinamarca': 'Cundinamarca',
        'Guainia': 'Guainía',
        'Guaviare': 'Guaviare',
        'Huila': 'Huila',
        'LaGuajira': 'LaGuajira',
        'Magdalena': 'Magdalena',
        'Meta': 'Meta',
        'Nariño': 'Nariño',
        'NorteDeSantander': 'Norte De Santander',
        'Putumayo': 'Putumayo',
        'Quindio': 'Quindío',
        'Risaralda': 'Risaralda',
        'SanAndres': 'San Andrés y Providencia',
        'Santander': 'Santander',
        'Sucre': 'Sucre',
        'Tolima': 'Tolima',
        'ValleDelCauca': 'Valle Del Cauca',
        'Vaupes': 'Vaupés',
        'Vichada': 'Vichada'
    }

    var municipios = {
        'Atlántico': {
            'Barranquilla': 'barranquilla',
            'Soledad': 'soledad',
            'PuertoColombia': 'Puerto Colombia'
        },

        'Amazonas': {
            'Leticia': 'leticia',
            'Puerto Nariño': 'puerto nariño',
            'La pedrera': 'la pedrera'
        },
        'Antioquia': {
            'Medellin': 'medellin',
            'Bello': 'bello',
            'Envigado': 'envigado'
        },
        'Arauca': {
            'Arauca': 'arauca',
            'Tame': 'tame',
            'Arauquita': 'arauquita'
        },
        'Bolívar': {
            'Cartagena': 'cartagena',
            'Altos del rosario': 'altos del rosario',
            'San jacinto': 'san jacinto'
        },
        'Boyacá': {
            'Tunja': 'tunja',
            '': 'duitama',
            'Sogamoso': 'sogamoso'
        },
        'Caldas': {
            'Manizales': 'manizales',
            'La Dorada': 'la dorada',
            'Riosucio': 'riosucio'
        },
        'Caquetá': {
            'Florencia': 'florencia',
            'San vicente del caguan ': 'san vicente del caguan',
            'Puerto rico ': 'puerto rico'
        },
        'Casanare': {
            'Yopal': 'yopal',
            'Aguazul': 'aguazul',
            'Paz de ariporo ': 'paz de ariporo'
        },
        'Cauca': {
            'Popayan': 'popayan',
            'Santander del quilichao': 'santander de quilichao',
            'Miranda': 'miranda'
        },
        'Cesar': {
            'Valledupar': 'Valledupar',
            'Aguachica': 'Aguachica',
            'Agustín Codazzi': 'Agustín Codazzi'
        },
        'Chocó': {
            'Quibdo': 'Quibdo',
            'Alto baudo ': 'Alto baudo ',
            'Medio baudo ': 'Medio baudo '
        },
        'Córdoba': {
            'Monteria': 'monteria',
            'San pelayo': 'san pelayo',
            'Santa cruz de lorica': 'santa cruz de lorica'
        },
        'Cundinamarca': {
            'bogota': 'bogota',
            'Girardot': 'girardot',
            'Mosquera': 'mosquera',
            'Chia': 'chia'
        },

        'Guainía': {
            'Inirida': 'inirida',
            'Barracominas': 'barracominas',
            'cacahual': 'cacahual'
        },
        'Guaviare': {
            'San jose del guaviare': 'san jose del guaviare',
            'El retorno': 'el retorno',
            'Miraflores': 'miraflores'
        },
        'Huila': {
            'Neiva': 'neiva',

        },
        'LaGuajira': {
            'Riohacha': 'riohacha',
            'Maicao': 'maicao',
            'Uribia': 'uribia'
        },

        'Magdalena': {
            'SantaMarta': 'santa marta',
            'Cienaga': 'cienaga',
            'Aracataca': 'aracataca'
        },
        'Meta': {
            'Villavicencio': 'villavicencio',
            'Acacias': 'acacias',
            'Granada': 'granada'
        },
        'Nariño': {
            'Pasto': 'pasto',
            'Tumaco': 'tumaco',
            'Ipiales': 'ipiales'
        },
        'Norte De Santander': {
            'Cucuta': 'cucuta',
            'Ocaña': 'ocaña',
            'Villa del rosario': 'villa del rosario'
        },
        'Putumayo': {
            'Mocoa': 'Mocoa',
            'Colón': 'Colón',
            'Orito': 'Orito'
        },
        'Quindío': {
            'Armenia': 'Armenia',
            'Buenavista': 'Buenavista',
            'Calarcá': 'Calarcá'
        },
        'Risaralda': {
            'Pereira': 'Pereira',
            'Apía': 'Apía',
            'Balboa': 'Balboa'

        },
        'Santander': {
            'Bucaramanga': 'Bucaramanga',
            'Aguada': 'Aguada',
            'Albania': 'Albania'

        },
        'San Andrés y Providencia': {
            'Providencia y Santa Catalina': 'Providencia y Santa Catalina'
        },
        'Sucre': {
            'Sincelejo': 'Sincelejo',
            'Buenavista': 'Buenavista',
            'Caimito': 'Caimito'
        },
        'Tolima': {
            'Ibague': 'Ibagué',
            'Alpujarra': 'Alpujarra',
            'Alvarado': 'Alvarado'
        },
        'Valle Del Cauca': {
            'Cali': 'Cali',
            'Alcalá': 'Alcalá',
            'Andalucía': 'Andalucía'
        },
        'Vaupés': {
            'Mitu': 'Mitú',
            'Caruru': 'Carurú',
            'Taraira': 'Taraira'
        },
        'Vichada': {
            'Puerto Carreño': 'Puerto Carreño',
            'Cumaribo': 'Cumaribo',
            'La Primavera': 'La Primavera',
            'Santa Rosalía' : 'Santa Rosalía'
        }


    }

    if ($("#oferta")) {
        var oferta = $("#oferta").val($(this).is(':checked'));
        var div = $("#inputOferta")



        oferta.click(function () {



            if (oferta.val($(this)).is(':checked')) {
                div.html("<input type='number' max='99' name='inputOferta'>");
            } else {
                div.html("");
            }


        });
    }
    if ($("#departamento")) {

        for (var i in departamentos) {
            if (departamentos.hasOwnProperty(i)) {
                // Mostrando en pantalla la clave junto a su valor
                dep.append(`
            <option value="${departamentos[i]}">${departamentos[i]}</option>
            `);
            }

        }




        dep.blur(function () {
            var value = document.querySelector('#departamento').selectedOptions[0].value;
            for (var i in municipios) {

                if (value == i) {
                    for (var j in municipios[i]) {
                        if (municipios[i].hasOwnProperty(j)) {
                            muni.append(`
                <option value="${municipios[i][j]}">${municipios[i][j]}</option>
                `);
                        }
                    }
                }
            }

        });

        dep.focus(function () {
            muni.html("");
        })
    }

});
