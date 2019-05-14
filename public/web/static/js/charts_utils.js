/**
 * Created by skgc on 2017/4/24.
 */
function pie2d(e_id, title, series) {
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: e_id,
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: title
        },
        tooltip: {
            headerFormat: '{series.name}<br>',
            pointFormat: '{point.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<span>{point.name}</span>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: series

        //     [{
        //     type: 'pie',
        //     name: '浏览器访问量占比',
        //     data: [
        //         {
        //             name: 'Firefox',
        //             y: 45.0,
        //             //sliced: true,
        //             //selected: true
        //         },
        //         ['IE',       26.8],
        //         {
        //             name: 'Chrome',
        //             y: 12.8,
        //             sliced: true,
        //             //selected: true
        //         },
        //         ['Safari',    8.5],
        //         ['Opera',     6.2],
        //         ['其他',   0.7]
        //     ]
        // }]
    });
}


function radar(e_id, title, categories, series) {

    var chart = new Highcharts.Chart({
        chart: {
            renderTo: e_id,
            polar: true,
            type: 'line'
        },
        title: {
            text: title,
            x: -80
        },
        pane: {
            size: '80%'
        },
        xAxis: {
            categories: categories,
            // categories: ['销售', '市场营销', '发展', '客户支持',
            //     '信息技术', '行政管理'],
            tickmarkPlacement: 'on',
            lineWidth: 0
        },
        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
            min: 0,
            max: 100,
            tickAmount: 5
        },
        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
        },
        legend: false,
        // legend: {
        //     align: 'right',
        //     verticalAlign: 'top',
        //     y: 70,
        //     layout: 'vertical'
        // },
        series: series
        // series: [{
        //     name: '预算拨款',
        //     data: [43000, 19000, 60000, 35000, 17000, 10000],
        //     pointPlacement: 'on'
        // }, {
        //     name: '实际支出',
        //     data: [50000, 39000, 42000, 31000, 26000, 14000],
        //     pointPlacement: 'on'
        // }]
    });
}