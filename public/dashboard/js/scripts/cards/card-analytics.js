$(window).on("load",function(){"use strict";var e,o,r,t,a,s,i,n,l,d,c,h,p=document.querySelector("#support-tracker-chart"),w=document.querySelector("#avg-session-chart"),b=document.querySelector("#revenue-report-chart"),f=document.querySelector("#budget-chart"),g=document.querySelector("#goal-overview-chart"),u=document.querySelector("#revenue-chart"),y=document.querySelector("#sales-chart"),m=document.querySelector("#sales-line-chart"),k=document.querySelector("#session-chart"),x=document.querySelector("#customer-chart"),S=document.querySelector("#product-order-chart"),z=document.querySelector("#earnings-donut-chart");e={chart:{height:270,type:"radialBar"},plotOptions:{radialBar:{size:150,offsetY:20,startAngle:-150,endAngle:150,hollow:{size:"65%"},track:{background:"#fff",strokeWidth:"100%"},dataLabels:{name:{offsetY:-5,color:"#5e5873",fontSize:"1rem"},value:{offsetY:15,color:"#5e5873",fontSize:"1.714rem"}}}},colors:[window.colors.solid.danger],fill:{type:"gradient",gradient:{shade:"dark",type:"horizontal",shadeIntensity:.5,gradientToColors:[window.colors.solid.primary],inverseColors:!0,opacityFrom:1,opacityTo:1,stops:[0,100]}},stroke:{dashArray:8},series:[83],labels:["Completed Tickets"]},new ApexCharts(p,e).render(),o={chart:{type:"bar",height:200,sparkline:{enabled:!0},toolbar:{show:!1}},states:{hover:{filter:"none"}},colors:["#ebf0f7","#ebf0f7",window.colors.solid.primary,"#ebf0f7","#ebf0f7","#ebf0f7"],series:[{name:"Sessions",data:[75,125,225,175,125,75,25]}],grid:{show:!1,padding:{left:0,right:0}},plotOptions:{bar:{columnWidth:"45%",distributed:!0,endingShape:"rounded"}},tooltip:{x:{show:!1}},xaxis:{type:"numeric"}},new ApexCharts(w,o).render(),r={chart:{height:230,stacked:!0,type:"bar",toolbar:{show:!1}},plotOptions:{bar:{columnWidth:"17%",endingShape:"rounded"},distributed:!0},colors:[window.colors.solid.primary,window.colors.solid.warning],series:[{name:"Earning",data:[95,177,284,256,105,63,168,218,72]},{name:"Expense",data:[-145,-80,-60,-180,-100,-60,-85,-75,-100]}],dataLabels:{enabled:!1},legend:{show:!1},grid:{padding:{top:-20,bottom:-10},yaxis:{lines:{show:!1}}},xaxis:{categories:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep"],labels:{style:{colors:"#b9b9c3",fontSize:"0.86rem"}},axisTicks:{show:!1},axisBorder:{show:!1}},yaxis:{labels:{style:{colors:"#b9b9c3",fontSize:"0.86rem"}}}},new ApexCharts(b,r).render(),t={chart:{height:80,toolbar:{show:!1},zoom:{enabled:!1},type:"line",sparkline:{enabled:!0}},stroke:{curve:"smooth",dashArray:[0,5],width:[2]},colors:[window.colors.solid.primary,"#dcdae3"],series:[{data:[61,48,69,52,60,40,79,60,59,43,62]},{data:[20,10,30,15,23,0,25,15,20,5,27]}],tooltip:{enabled:!1}},new ApexCharts(f,t).render(),a={chart:{height:245,type:"radialBar",sparkline:{enabled:!0},dropShadow:{enabled:!0,blur:3,left:1,top:1,opacity:.1}},colors:["#51e5a8"],plotOptions:{radialBar:{offsetY:-10,startAngle:-150,endAngle:150,hollow:{size:"77%"},track:{background:"#ebe9f1",strokeWidth:"50%"},dataLabels:{name:{show:!1},value:{color:"#5e5873",fontSize:"2.86rem",fontWeight:"600"}}}},fill:{type:"gradient",gradient:{shade:"dark",type:"horizontal",shadeIntensity:.5,gradientToColors:[window.colors.solid.success],inverseColors:!0,opacityFrom:1,opacityTo:1,stops:[0,100]}},series:[83],stroke:{lineCap:"round"},grid:{padding:{bottom:30}}},new ApexCharts(g,a).render(),s={chart:{height:240,toolbar:{show:!1},zoom:{enabled:!1},type:"line",offsetX:-10},stroke:{curve:"smooth",dashArray:[0,12],width:[4,3]},grid:{borderColor:"#e7eef7"},legend:{show:!1},colors:["#d0ccff","#ebe9f1"],fill:{type:"gradient",gradient:{shade:"dark",inverseColors:!1,gradientToColors:[window.colors.solid.primary,"#ebe9f1"],shadeIntensity:1,type:"horizontal",opacityFrom:1,opacityTo:1,stops:[0,100,100,100]}},markers:{size:0,hover:{size:5}},xaxis:{labels:{style:{colors:"#b9b9c3",fontSize:"1rem"}},axisTicks:{show:!1},categories:["01","05","09","13","17","21","26","31"],axisBorder:{show:!1},tickPlacement:"on"},yaxis:{tickAmount:5,labels:{style:{colors:"#b9b9c3",fontSize:"1rem"},formatter:function(e){return e>999?(e/1e3).toFixed(0)+"k":e}}},grid:{padding:{top:-20,bottom:-10,left:20}},tooltip:{x:{show:!1}},series:[{name:"This Month",data:[45e3,47e3,44800,47500,45500,48e3,46500,48600]},{name:"Last Month",data:[46e3,48e3,45500,46600,44500,46500,45e3,47e3]}]},new ApexCharts(u,s).render(),i={chart:{height:300,type:"radar",dropShadow:{enabled:!0,blur:8,left:1,top:1,opacity:.2},toolbar:{show:!1},offsetY:5},series:[{name:"Sales",data:[90,50,86,40,100,20]},{name:"Visit",data:[70,75,70,76,20,85]}],stroke:{width:0},colors:[window.colors.solid.primary,window.colors.solid.info],plotOptions:{radar:{polygons:{strokeColors:["#ebe9f1","transparent","transparent","transparent","transparent","transparent"],connectorColors:"transparent"}}},fill:{type:"gradient",gradient:{shade:"dark",gradientToColors:[window.colors.solid.primary,window.colors.solid.info],shadeIntensity:1,type:"horizontal",opacityFrom:1,opacityTo:1,stops:[0,100,100,100]}},markers:{size:0},legend:{show:!1},labels:["Jan","Feb","Mar","Apr","May","Jun"],dataLabels:{background:{foreColor:["#ebe9f1","#ebe9f1","#ebe9f1","#ebe9f1","#ebe9f1","#ebe9f1"]}},yaxis:{show:!1},grid:{show:!1,padding:{bottom:-27}}},new ApexCharts(y,i).render(),n={chart:{height:240,toolbar:{show:!1},zoom:{enabled:!1},type:"line",dropShadow:{enabled:!0,top:18,left:2,blur:5,opacity:.2},offsetX:-10},stroke:{curve:"smooth",width:4},grid:{borderColor:"#ebe9f1",padding:{top:-20,bottom:5,left:20}},legend:{show:!1},colors:["#df87f2"],fill:{type:"gradient",gradient:{shade:"dark",inverseColors:!1,gradientToColors:[window.colors.solid.primary],shadeIntensity:1,type:"horizontal",opacityFrom:1,opacityTo:1,stops:[0,100,100,100]}},markers:{size:0,hover:{size:5}},xaxis:{labels:{offsetY:5,style:{colors:"#b9b9c3",fontSize:"0.857rem"}},axisTicks:{show:!1},categories:["Jan","Feb","Mar","Apr","May","Jun","July","Aug","Sep","Oct","Nov","Dec"],axisBorder:{show:!1},tickPlacement:"on"},yaxis:{tickAmount:5,labels:{style:{colors:"#b9b9c3",fontSize:"0.857rem"},formatter:function(e){return e>999?(e/1e3).toFixed(1)+"k":e}}},tooltip:{x:{show:!1}},series:[{name:"Sales",data:[140,180,150,205,160,295,125,255,205,305,240,295]}]},new ApexCharts(m,n).render(),l={chart:{type:"donut",height:300,toolbar:{show:!1}},dataLabels:{enabled:!1},series:[58.6,34.9,6.5],legend:{show:!1},comparedResult:[2,-3,8],labels:["Desktop","Mobile","Tablet"],stroke:{width:0},colors:[window.colors.solid.primary,window.colors.solid.warning,window.colors.solid.danger]},new ApexCharts(k,l).render(),d={chart:{type:"pie",height:325,toolbar:{show:!1}},labels:["New","Returning","Referrals"],series:[690,258,149],dataLabels:{enabled:!1},legend:{show:!1},stroke:{width:4},colors:[window.colors.solid.primary,window.colors.solid.warning,window.colors.solid.danger]},new ApexCharts(x,d).render(),c={chart:{height:325,type:"radialBar"},colors:[window.colors.solid.primary,window.colors.solid.warning,window.colors.solid.danger],stroke:{lineCap:"round"},plotOptions:{radialBar:{size:150,hollow:{size:"20%"},track:{strokeWidth:"100%",margin:15},dataLabels:{value:{fontSize:"1rem",colors:"#5e5873",fontWeight:"500",offsetY:5},total:{show:!0,label:"Total",fontSize:"1.286rem",colors:"#5e5873",fontWeight:"500",formatter:function(e){return 42459}}}}},series:[70,52,26],labels:["Finished","Pending","Rejected"]},new ApexCharts(S,c).render(),h={chart:{type:"donut",height:120,toolbar:{show:!1}},dataLabels:{enabled:!1},series:[53,16,31],legend:{show:!1},comparedResult:[2,-3,8],labels:["App","Service","Product"],stroke:{width:0},colors:["#28c76f66","#28c76f33",window.colors.solid.success],grid:{padding:{right:-20,bottom:-8,left:-20}},plotOptions:{pie:{startAngle:-10,donut:{labels:{show:!0,name:{offsetY:15},value:{offsetY:-15,formatter:function(e){return parseInt(e)+"%"}},total:{show:!0,offsetY:15,label:"App",formatter:function(e){return"53%"}}}}}},responsive:[{breakpoint:1325,options:{chart:{height:100}}},{breakpoint:1200,options:{chart:{height:120}}},{breakpoint:1065,options:{chart:{height:100}}},{breakpoint:992,options:{chart:{height:120}}}]},new ApexCharts(z,h).render()});
