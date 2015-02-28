
Chart.defaults.global.responsive = true;

createPolarChart();
$("#detailed-insights-header").fadeIn("slow", function() {
    createLineChart();
});

// make charts responsive

/* create total usability chart - POLAR AREA CHART */

function createPolarChart() {
    var ctxTotalURate = $("#totalUsabilityChart").get(0).getContext("2d");

    var dataPolar = [
        {
            value: 300,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "Easy to use"
        },
        {
            value: 50,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Intuitive"
        },
        {
            value: 100,
            color: "#FDB45C",
            highlight: "#FFC870",
            label: "Credible"
        },
        {
            value: 40,
            color: "#949FB1",
            highlight: "#A8B3C5",
            label: "Trustable"
        },
        {
            value: 120,
            color: "#4D5360",
            highlight: "#616774",
            label: "Fast"
        }

    ];

    var myPolarChart = new Chart(ctxTotalURate).PolarArea(dataPolar, {
        animation: false,
        onAnimationComplete : function() {
        }
    });
}

/* create a line chart */
// get canvas context
function createLineChart() {

    var ctxLine = $("#lineChart1").get(0).getContext("2d");

    var dataLine = {
        labels: ["January", "February", "March", "April"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19]
            }
        ]
    };

    var myLineChart = new Chart(ctxLine).Line(dataLine, {
        onAnimationComplete: function() {
            $(".youtube-video").fadeIn("fast");
            createBarChart();
        }
    });
}

/* create bar chart */
function createBarChart() {
    var ctxBar = $("#barChart2").get(0).getContext("2d");

    var dataBar = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.5)",
                strokeColor: "rgba(151,187,205,0.8)",
                highlightFill: "rgba(151,187,205,0.75)",
                highlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };

    var myBarChart = new Chart(ctxBar).Bar(dataBar, {
        onAnimationComplete: function() {
            createRadarChart();
        }
    });  
}


/* create radar chart */
function createRadarChart() {
    var ctxRadar = $("#radarChart3").get(0).getContext("2d");

    var dataRadar = {
        labels: ["Fast & easy", "Intuitive", "Easy to understand", "Scalable"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 90, 81]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19]
            }
        ]
    };

    var myRadarChart = new Chart(ctxRadar).Radar(dataRadar);
}


/****************** YOUTUBE API ****************/

// 2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
function onYouTubeIframeAPIReady() {
	player = new YT.Player('player', {
		height: '390',
		width: '640',
		videoId: 'hzDLTvkb304',
		events: {
			'onReady': onPlayerReady,
			'onStateChange': onPlayerStateChange
		}
	});
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
	event.target.stopVideo();
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
var done = false;
function onPlayerStateChange(event) {
	if (event.data == YT.PlayerState.PLAYING && !done) {
		setTimeout(stopVideo, 6000);
		done = true;
	}
}
function stopVideo() {
	player.stopVideo();
}
/*****************************************/