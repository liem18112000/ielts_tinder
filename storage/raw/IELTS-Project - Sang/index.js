function SignInSignUp(){
    document.getElementById("linkBtn1").setAttribute("href","/html/signup-signin.html");
}
function SignUp(){
    document.getElementById("linkBtn2").setAttribute("href","/html/signup.html");
}
function SignIn(){
    document.getElementById("linkBtn3").setAttribute("href","/html/signin.html");
}
function AboutYourself(){
    document.getElementById("linkBtn4").setAttribute("href","/html/about-yourself.html");
}
function AboutPartner(){
    document.getElementById("linkBtn5").setAttribute("href","/html/AboutPartner.html");
}

function NewsfeedFollowing(){
    document.getElementById("linkBtn6").setAttribute("href","/html/newsfeed-following.html");
}

/* chart */
const dataSource = {
    chart: {
    showvalues: "0",
    caption: "Individual Evaluation",
    subcaption: "(2020)",
    plottooltext: "Score of $seriesName in $label was <b>$dataValue</b>",
    showhovereffect: "1",
    yaxisname: "Band Score",
    showsum: "1",
    theme: "fusion",
    animationEnabled: true,
    },
    categories: [
        {
            category: [
                {
                    label: "Jan"
                },
                {
                    label: "Feb"
                },
                {
                    label: "Mar"
                },
                {
                    label: "Apr"
                },
                {
                    label: "May"
                },
                {
                    label: "Jun"
                },
                {
                    label: "Jul"
                },
                {
                    label: "Aug"
                },
                {
                    label: "Sep"
                },
                {
                    label: "Oct"
                },
                {
                    label: "Nov"
                },
                {
                    label: "Dec"
                }
            ]
        }
    ],
    dataset: [
        {
            seriesname: "Fluency and coherence",
            data: [
                {
                    value: 4/4
                },
                {
                    value: 4.5/4
                },
                {
                    value: 4.5/4
                },
                {
                    value: 5/4
                },
                {
                    value: 5.5/4
                },
                {
                    value: 6/4
                },
                {
                    value: 6.5/4
                },
                {
                    value: 7.5/4
                },
                {
                    value: 8/4
                },
                {
                    value: 8.5/4
                },
                {
                    value: 8.5/4
                },
                {
                    value: 9/4
                }
            ]
        },
        {
            seriesname: "Lexical resource",
            data: [
                {
                    value: 4/4
                },
                {
                    value: 4.5/4
                },
                {
                    value: 4.5/4
                },
                {
                    value: 5/4
                },
                {
                    value: 5.5/4
                },
                {
                    value: 6/4
                },
                {
                    value: 6.5/4
                },
                {
                    value: 7.5/4
                },
                {
                    value: 8/4
                },
                {
                    value: 8.5/4
                },
                {
                    value: 8.5/4
                },
                {
                    value: 9/4
                }
            ]
        },
        {
            seriesname: "Grammatical range and accuracy",
            data: [
                {
                    value: 4/4
                },
                {
                    value: 4.5/4
                },
                {
                    value: 4.5/4
                },
                {
                    value: 5/4
                },
                {
                    value: 5.5/4
                },
                {
                    value: 6/4
                },
                {
                    value: 6.5/4
                },
                {
                    value: 7.5/4
                },
                {
                    value: 8/4
                },
                {
                    value: 8.5/4
                },
                {
                    value: 8.5/4
                },
                {
                    value: 9/4
                }
            ]
        },
        {
            seriesname: "Pronunciation",
            data: [
                {
                    value: 4/4
                },
                {
                    value: 4.5/4
                },
                {
                    value: 4.5/4
                },
                {
                    value: 5/4
                },
                {
                    value: 5.5/4
                },
                {
                    value: 6/4
                },
                {
                    value: 6.5/4
                },
                {
                    value: 7.5/4
                },
                {
                    value: 8/4
                },
                {
                    value: 8.5/4
                },
                {
                    value: 8.5/4
                },
                {
                    value: 9/4
                }
            ]
        },
        {
            seriesname: "Speaking Score",
            plottooltext: "Total Speaking Score in $label was <b>$dataValue</b>",
            renderas: "Line",
            data: [
                {
                    value: "4.0"
                },
                {
                    value: "4.5"
                },
                {
                    value: "4.5"
                },
                {
                    value: "5.0"
                },
                {
                    value: "5.5"
                },
                {
                    value: "6.0"
                },
                {
                    value: "6.5"
                },
                {
                    value: "7.5"
                },
                {
                    value: "8.0"
                },
                {
                    value: "8.5"
                },
                {
                    value: "8.5"
                },
                {
                    value: "9"
                }
            ]
        }
    ]
};

FusionCharts.ready(function() {
var myChart = new FusionCharts({
    type: "stackedcolumn2dline",
    renderAt: "chart-container",
    width: "100%",
    height: "100%",
    dataFormat: "json",
    dataSource
    }).render();
});