var Script = function () {

    //morris chart

    $(function () {
      // data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type
      var tax_data = [
           {"periodo": "2012", "dengue": 2300, "malaria": 800, "colera": 600, 'gripe':100, 'chikungunya': null},
           {"periodo": "2013", "dengue": 2000, "malaria": 723, "colera": 325, 'gripe':100, 'chikungunya': null},
           {"periodo": "2014", "dengue": 3650, "malaria": 520, "colera": 200, 'gripe':100, 'chikungunya': 700},
           {"periodo": "2015", "dengue": 300, "malaria": 100, "colera": 50, 'gripe':100, 'chikungunya': 50},          
      ];
      Morris.Line({
        element: 'enfermedades',
        data: tax_data,
        xkey: 'periodo',
        ykeys: ['dengue', 'malaria', 'colera', 'gripe', 'chikungunya'],
        labels: ['Dengue', 'Malaria', 'Colera', 'Gripe', 'Chikungunya'],
        lineColors:['#4ECDC4','#ed5565', '#ff9900', '#00a4e4']
      });

      Morris.Donut({
        element: 'hero-donut',
        data: [
          {label: 'Norwin', value: 200 },
          {label: 'Allan', value: 130 },
          {label: 'Tania', value: 175 },
          {label: 'Pepe', value: 150 }
        ],
          colors: ['#3498db', '#2980b9', '#3498db'],
        formatter: function (y) { return y + "" }
      });

      Morris.Area({
        element: 'hero-area',
        data: [
          {period: '2013 Q1', dengue: 2666, malaria: null, colera: 2647},
          {period: '2013 Q2', dengue: 2778, malaria: 2294, colera: 2441},
          {period: '2013 Q3', dengue: 4912, malaria: 1969, colera: 2501},
          {period: '2013 Q4', dengue: 3767, malaria: 3597, colera: 5689},
          {period: '2014 Q1', dengue: 6810, malaria: 1914, colera: 2293},
          {period: '2014 Q2', dengue: 5670, malaria: 4293, colera: 1881},
          {period: '2014 Q3', dengue: 4820, malaria: 3795, colera: 1588},
          {period: '2014 Q4', dengue: 15073, malaria: 5967, colera: 5175},
          {period: '2015 Q1', dengue: 10687, malaria: 4460, colera: 2028},
          {period: '2015 Q2', dengue: 8432, malaria: 5713, colera: 1791}
        ],

          xkey: 'period',
          ykeys: ['dengue', 'malaria', 'colera'],
          labels: ['Dengue', 'Malaria', 'Colera'],
          hideHover: 'auto',
          lineWidth: 1,
          pointSize: 5,
          lineColors: ['#4a8bc2', '#ff6c60', '#a9d86e'],
          fillOpacity: 0.5,
          smooth: true
      });

      Morris.Bar({
        element: 'hero-bar',
        data: [
          {device: 'Agosto', pacientes: 236},
          {device: 'Septiembre', pacientes: 237},
          {device: 'Octubre', pacientes: 275},
          {device: 'Noviembre', pacientes: 380},
          {device: 'Diciembre', pacientes: 655},
          {device: 'Enero', pacientes: 150}
        ],
        xkey: 'device',
        ykeys: ['pacientes'],
        labels: ['Pacientes'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        barColors: ['#ac92ec']
      });

      new Morris.Line({
        element: 'examplefirst',
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Value'],
        data: [
          {year: '2008', value: 20},
          {year: '2009', value: 10},
          {year: '2010', value: 5},
          {year: '2011', value: 5},
          {year: '2012', value: 20}
        ]
      });

      $('.code-example').each(function (index, el) {
        eval($(el).text());
      });
    });

}();




