<script>
    let totalSpese = 0;
    let gain       = 0;
    let expenses   = 0;
    let money      = null;
    let date       = new Date();
    let text       = ''

    const sse = new EventSource('../server.php');
    sse.onmessage = function(event) {
        document.querySelector('main').innerHTML = '';
        const data = JSON.parse(event.data);
        console.log(data);
        data.forEach((item) => {
            const row = document.createElement('p');
                  row.innerHTML = item;
            document.querySelector('main').append(row);
        });
    };

    /* struttura dati da salvare nel local storage */
    let spese = {
        "2022": {
            "01": {
                "12": {
                    money: -10,
                    text: "spesa Conad",
                    time: "12:32:18",
                },
                "17": {
                    money: 3232,
                    text: "spesa",
                    time: "12:32:18",
                },
                "20": {
                    money: 3232,
                    text: "spesa",
                    time: "12:32:18",
                },
            },
            "02": {
                "12": {
                    money: 231,
                    text: "ddd",
                    time: "12:32:18",
                },
                "04": {
                    money: 333,
                    text: "sddsa",
                    time: "12:32:18",
                },
                "14": {
                    money: 3232,
                    text: "spesa",
                    time: "12:32:18",
                },
            },
            "04": {
                "12": {
                    money: 44,
                    text: "aaaa",
                    time: "12:32:18",
                },
                "09": {
                    money: 55,
                    text: "sss",
                    time: "12:32:18",
                },
                "19": {
                    money: 66,
                    text: "dss",
                    time: "12:32:18",
                },
            },
        },
    };

    let year = String(date.getFullYear());
    let month = String(date.getMonth() + 1).padStart(2, "0");
    /* month = "01"; */
    // console.log(month, typeof(month));

    // console.log(spese[year][month]);

    let days = spese[year][month];
    let keys = Object.keys(days);
    let day = keys[0];
    let monthsTotal = [];
    monthsTotal['01'] = 1000;
    /* console.log(monthsTotal[month]); */
    monthsTotal[month] = 0;
    keys.forEach((key, i) => {
        let day = key;
        monthsTotal[month] += spese[year][month][day].money;
    });

    console.log(monthsTotal);

    let yearTotal = 0;

    json2array(monthsTotal).forEach((value, i) => {
        console.log('Totale del mese: ',value);
        yearTotal += value;
    });
    // console.log(spese[year][month][day]);
    console.log("Totale dell'anno: ", yearTotal);

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
        if (e.charCode === 13 && money !== 0) {
            money > 0 ? (expenses += money) : (gain += money);

            totalSpese = expenses + gain;
            money = null;
            text  = null;
        }
    }
    

</script>

<main>
    <div class="container">
        <h1 class="title"><span>Balance</span></h1>
        <h4 class="title green plus_app_fill">Guadagni {expenses}</h4>
        <h4 class="title red">Spese {gain}</h4>
        <div>
            <input type="number" bind:value={money} on:keypress={addValue} placeholder="Quantita'"/>
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
