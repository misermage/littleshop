$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010 Q1',
            sells: 2666,
        }, {
            period: '2010 Q2',
            sells: 2778,
        }, {
            period: '2010 Q3',
            sells: 4912,
        }, {
            period: '2010 Q4',
            sells: 3767,
        }, {
            period: '2011 Q1',
            sells: 6810,
        }, {
            period: '2011 Q2',
            sells: 5670,
        }, {
            period: '2011 Q3',
            sells: 4820,
        }, {
            period: '2011 Q4',
            sells: 15073,
        }, {
            period: '2012 Q1',
            sells: 10687,
        }, {
            period: '2012 Q2',
            sells: 8432,
        }],
        xkey: 'period',
        ykeys: ['sells'],
        labels: ['Продажі'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });
    
});
