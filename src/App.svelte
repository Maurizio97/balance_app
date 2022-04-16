<script>
    let totalSpese    = 0;
    let gain     = 0;
    let expenses = 0;
    let input    = null;
    let date = new Date();

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

            total = expenses + gain;
            input = null;
        }
    }
</script>

<main>
    <h1>Totale {totalSpese}</h1>
    <h1>Spese {gain}</h1>
    <h1>Guadagni {expenses}</h1>

    <div>
        <input type="number" bind:value={input} on:keypress={addValue} />
    </div>
</main>

<style>
</style>
