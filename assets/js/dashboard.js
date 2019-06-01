var Dashboard = function() {
    var e = function(e, t, a, r) {

        },
        t = function() {

            e(), $(document).find('a[data-toggle="pill"]').on("shown.bs.tab", function(t) {
                switch ($(t.target).attr("href")) {
                }
            })
        };
    return {
        init: function() {
            var a, r;
            ! function() {
                var e = $("#m_chart_daily_sales");
            }(), 0 != $("#m_chart_profit_share").length && new Chartist.Pie("#m_chart_profit_share", {
                    series: [
                    {
                        value: 30,
                        className: "custom",
                        meta: {color: mApp.getColor("brand")}
                    },{
                        value: 30,
                        className: "custom",
                        meta: {color: mApp.getColor("accent")}
                    },{
                        value: 36,
                        className: "custom",
                        meta: {color: mApp.getColor("warning")}
                    }],
                    labels: [1, 2, 3]
                }, {
                    donut: !0,
                    donutWidth: 17,
                    showLabel: !1
                }).on("draw", function(e) {
                    if ("slice" === e.type) {
                        var t = e.element._node.getTotalLength();
                        e.element.attr({
                            "stroke-dasharray": t + "px " + t + "px"
                        });
                        var a = {
                            "stroke-dashoffset": {
                                id: "anim" + e.index,
                                dur: 1e3,
                                from: -t + "px",
                                to: "0px",
                                easing: Chartist.Svg.Easing.easeOutQuint,
                                fill: "freeze",
                                stroke: e.meta.color
                            }
                        };
                        0 !== e.index && (a["stroke-dashoffset"].begin = "anim" + (e.index - 1) + ".end"), e.element.attr({
                            "stroke-dashoffset": -t + "px",
                            stroke: e.meta.color
                        }), e.element.animate(a, !1)
                    }
                }),
               0 != $("#m_chart_revenue_change").length && Morris.Donut({
                    element: "m_chart_revenue_change",
                    data: [
                    	{label: "New York",value: 10}, 
                    	{label: "London",value: 7}, 
                    	{label: "Paris",value: 20},
                    	{label: "London",value: 7},
                    	{label: "London",value: 7},
                    ],
                    colors: [
                    	mApp.getColor("accent"), 
                    	mApp.getColor("danger"), 
                    	mApp.getColor("brand"), 
                    	mApp.getColor("warning"),
                    	mApp.getColor("info"),
                    ]
                })
        }
    }
}();
jQuery(document).ready(function() {
    Dashboard.init()
});