<script>
    let totalSpese = 0;
    let gain       = 0;
    let expenses   = 0;
    let input      = null;
    let date       = new Date();
    let text       = ''

    /* struttura dati da salvare nel local storage */
    let spese = {
        "2022": {
            "03": {
                "12": {
                    input: -10,
                    text: "spesa Conad",
                    time: "12:32:18",
                },
                "17": {
                    input: 3232,
                    text: "spesa",
                    time: "12:32:18",
                },
                "20": {
                    input: 3232,
                    text: "spesa",
                    time: "12:32:18",
                },
            },
            "04": {
                "12": {
                    input: 231,
                    text: "ddd",
                    time: "12:32:18",
                },
                "04": {
                    input: 333,
                    text: "sddsa",
                    time: "12:32:18",
                },
                "14": {
                    input: 3232,
                    text: "spesa",
                    time: "12:32:18",
                },
            },
            "05": {
                "12": {
                    input: 44,
                    text: "aaaa",
                    time: "12:32:18",
                },
                "09": {
                    input: 55,
                    text: "sss",
                    time: "12:32:18",
                },
                "19": {
                    input: 66,
                    text: "dss",
                    time: "12:32:18",
                },
            },
        },
    };

    let year = String(date.getFullYear());
    let month = String(date.getMonth() + 1).padStart(2, "0");
    month = "04";
    // console.log(month, typeof(month));

    // console.log(spese[year][month]);

    let days = spese[year][month];
    let keys = Object.keys(days);
    let day = keys[0];
    let total = [];

    total[month] = 0;
    keys.forEach((key, i) => {
        let day = key;
        total[month] += spese[year][month][day].input;
    });

    console.log(total);

    let fulltotal = 0;

    json2array(total).forEach((key, i) => {
        fulltotal += key;
    });
    // console.log(spese[year][month][day]);
    console.log("fulltotal", fulltotal);

    function json2array(json) {
        var result = [];
        var keys = Object.keys(json);
        keys.forEach(function (key) {
            result.push(json[key]);
        });
        return result;
    }

    // console.log('anno' ,date.getFullYear());
    // console.log('mese' ,date.getMonth() + 1);
    // console.log('giorno' ,date.getDate());
    // console.log('ore' ,date.getHours());
    // console.log('min' ,date.getMinutes());
    // console.log('sec' ,date.getSeconds());
    function addValue(e) {
        if (e.charCode === 13 && input !== 0) {
            input > 0 ? (expenses += input) : (gain += input);

            totalSpese = expenses + gain;
            input = null;
            text  = null;
        }
    }
</script>

<main>
    <div class="container">
        <h1 class="title"><span>Balance</span></h1>
        <h4 class="title red">Spese {gain}</h4>
        <h4 class="title green plus_app_fill">Guadagni {expenses}</h4>
        <div>
            <input type="number" bind:value={input} on:keypress={addValue} placeholder="Quantita'"/>
            <input type="text" bind:value={text} on:keypress={addValue} placeholder="Descrizione">
        </div>
        <h4 class="title blue">Totale {totalSpese}</h4>
        
    </div>
</main>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;200;300&display=swap');
    .container {
        font-family: 'Roboto Mono', monospace;
        background-color: rgb(78, 77, 77);
        color: white;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .title {
        text-shadow: 2px 1px 5px darkblue;
        margin: 1rem 0;

    }
    div {
        text-align: center;
    }
    .blue {
        color: var(--blue);
    }
    .red {
        color: var(--red);
    }
    .green {
        color: var(--green);
    }
</style>
