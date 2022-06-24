<script>
    let hello = 'CIAOOOO'
    import Transaction from './transaction.svelte';
    import { onMount } from 'svelte';

    let spese = [];

    onMount(async () => {
        const rawResponse = await fetch('http://localhost:82/balance_app/server.php', {
            method: 'get',
            mode: 'cors',
            headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin':'*'
            },
        });
        spese = await rawResponse.json();

        show();
    });

    let totalSpese = 0;
    let gain       = 0;
    let expenses   = 0;
    let money      = null;
    let date       = new Date();
    let text       = '';

    function show() {
        console.log(spese);
        let year = String(date.getFullYear());
        let month = String(date.getMonth() + 1).padStart(2, "0");
        // month = "01";

        let days = spese[year][month];
        // let keys = Object.keys(days);
        let dayArray = json2array(days);
        console.log(dayArray);

        // let day = keys[0];
        let monthsTotal = [];
        // monthsTotal['01'] = 1000;
        /* console.log(monthsTotal[month]); */
        monthsTotal[month] = 0;
        dayArray.forEach((hours, i) => {
            // console.log("ore del giorno",hours);
            let hoursArray = json2array(hours);
            hoursArray.forEach((hour) => {
                // console.log("ora singola", hour);
                monthsTotal[month] += hour.money;
            })
        });

        console.log("Totale del mese", monthsTotal);

        let yearTotal = 0;

        json2array(monthsTotal).forEach((value, i) => {
            // console.log('Totale del mese: ',value);
            yearTotal += value;
        });
        // console.log(spese[year][month][day]);
        console.log("Totale dell'anno: ", yearTotal);
    }

    function json2array(json) {
        var result = [];
        var keys   = Object.keys(json);
        keys.forEach(function (key) {
            result.push(json[key]);
        });
        return result;
    };

    async function addValue(e) {
        if (e.charCode === 13 && money !== 0) {
            money > 0 ? (expenses += money) : (gain += money);

            totalSpese = expenses + gain;

            let date       = new Date();
            let nowYear    = String(date.getFullYear());
            let nowMonth   = String(date.getMonth() + 1).padStart(2, "0");
            let nowDay     = String(date.getDate()).padStart(2, "0");
            // let nowHour    = String(date.getHours()).padStart(2, "0");
            // let nowMinutes = String(date.getMinutes()).padStart(2, "0");
            // let nowSeconds = String(date.getSeconds()).padStart(2, "0");

            // let time       = `${nowHour}:${nowMinutes}:${nowSeconds}`;

            let form = new FormData();
            form.append('year', nowYear);
            form.append('month', nowMonth);
            form.append('day', nowDay);
            // form.append('time', time);
            form.append('money', money);
            form.append('text', text);

            const response = await fetch('http://localhost:82/balance_app/server.php', {
                method: 'post',
                body: form
            })
            spese = await response.json();
            text  = null;
            money = null;
            show();
        }
    }

</script>

<main>
    <div id="app">
      <div id="button_add">&plus;</div>
      <div class="container">
        <div class="balance">
          <div class="balance__total">
            <h1>Balance</h1>
            <p><span class="pound">&euro; <span>10000</span></span>&nbsp</p>
          </div>

          <div class="balance__type balance__income">
            <div class="balance__group">
              <h2>Income</h2>
              <p>&euro; 10000</p>
            </div>
            <span class="material-icons">&#10138;</span>
          </div>

          <div class="balance__type balance__expense">
            <div class="balance__group">
              <h2>Expenses</h2>
              <p>&euro; 23456</p>
            </div>
            <span class="material-icons">&#10138;</span>
          </div>
        </div>

        <div class="balance__details">

          <h3>Recent Transactions</h3>
          <input type="month" id="start" min="2010-01" max="2022-06" value="2022-06">
          <!-- <div class="balance__empty">
            <span class="material-icons">loyalty</span>
            <p>Start adding <br>a new transaction</p>
          </div> -->
         <Transaction Transaction={ hello }/>
        </div>
      </div>
    </div>
</main>

<style>
    :root {
  --primary: #7b56ff;
  --secondary: #ff6fb7;
  --tertiary: #a9e61c;
  --other: #00c9ec;
  --other2: #ffcd44;
  --white: #FFFFFF;
  --greyLight-1: #ebf2fc;
  --greyLight-2: #d5ddf3;
  --greyLight-3: #bec8e4;
  --greyLight-4: #969eb4;
  --greyDark: #5b657a;
}

#app {
  height: 100vh;
  background: var(--greyLight-1);
}

#button_add {
  position: absolute;
  right: 10px;
  top: 10px;
  height: 40px;
  width: 40px;
  font-size: 1.7rem;
  color: var(--greyDark);
  display: flex;
  justify-content: center;
  background: var(--white);
  border-radius: 50%;
  box-shadow: 0px 6px 14px rgba(99, 85, 155, 0.4);
}

[type="month"] {
  width: 40vw;
  height: 20px;
  padding: 15px 5px;
  font-size: .9rem;
  border-radius: 0.8rem;
  border: var(--greyDark) 0.2px solid;
  color: var(--greyDark);
  box-shadow: 0px 6px 14px rgb(99 85 155 / 40%);
}
.container {
  display: grid;
  grid-template-rows: 40% 60%;
  flex-direction: column;
  height: 100%;
  box-shadow: 0px 20px 40px rgba(91, 101, 122, 0.15);
  background: var(--white);
  color: var(--greyDark);
  letter-spacing: 0.04rem;
}

.balance {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-template-rows: 50% 50%;
  justify-items: center;
  align-items: center;
  grid-column-gap: 1.5rem;
  padding: 2rem 1.5rem;
  background: var(--primary);
  background-image: linear-gradient(-135deg, #7b56ff 40%, #52e2ff 120%);
}
.balance__total {
  grid-column: 1/3;
  color: var(--white);
  text-align: center;
}
.balance__total h1 {
  font-weight: 400;
}
.balance__total p {
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.8rem;
}
.balance__total p .pound {
  font-size: 2.2rem;
  font-size: 2.2rem;

}
.balance__type {
  width: 100%;
  padding: 0.8rem 0.8rem 0.8rem 1.4rem;
  margin-bottom: 1rem;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  background: var(--white);
  border-radius: 0.8rem;
  box-shadow: 0px 6px 14px rgba(99, 85, 155, 0.4);
}
.balance__type h2 {
  font-size: 1rem;
}
.balance__type p {
  font-size: 1.2rem;
  font-weight: 600;
}
.balance__type span {
  font-size: 2rem;
}

/* .material-icons {
  font-size: 2rem;
} */

.balance__group {
  display: flex;
  flex-direction: column;
}
.balance__income span {
  color: var(--tertiary);
  transform: rotate(-180deg);
}
.balance__expense span {
  color: var(--secondary);
}
.balance p {
  margin-top: 0.4rem;
}
.balance__details {
  background: var(--white);
  display: flex;
  flex-direction: column;
  padding: 0 calc(1.8rem - 10px) 0 1.8rem;
  border-radius: 2.4rem;
  font-size: 1.2rem;
  margin-top: -2rem;
  position: relative;
}
.balance__details::after {
  position: absolute;
  content: "";
  border-radius: inherit;
  height: 100%;
  width: 100%;
  left: 0;
  z-index: 400;
  box-shadow: inset 0px -20px 20px var(--white);
  pointer-events: none;
}
.balance__details h3 {
  margin: 2rem .4rem 1rem .4rem;
}

/* .balance__empty {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 80%;
  color: var(--greyLight-3);
  text-align: center;
}
.balance__empty span {
  font-size: 4rem;
  margin-bottom: 1.2rem;
}
.balance__empty p {
  font-size: 1.4rem;
} */

</style>
