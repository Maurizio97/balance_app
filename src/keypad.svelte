<script>
  let current = '0.00';
  function toggleKeypad() {
    let keypad = document.querySelector("#keypad");
    let main   = document.querySelector("#main");
    keypad.classList.toggle("hidden");
    main.classList.toggle("hidden");
  }

  function getValue(val) {
    // let key = val.target.innerText
    // console.log(key);
    let key = val.target.innerText;
            if (current == '0.00' ) {
                current = '';
            }
            if( current.length >= 6) {
                current = 'error!';
            }
            current += key;
            console.log(current);
            // this.currentColor = '#5b657a';
  }
</script>

<div id="keypad" class="container">
  <div id="button_back" on:click={toggleKeypad} >&lt;</div>
  <div class="type">

      <div class="type__tab">
        <input type="radio" name="radio" id="tab-1" checked>
        <label for="tab-1">Income</label>
        <input type="radio" name="radio" id="tab-2">
        <label for="tab-2">Expense</label>
        <div class="type__color"></div>
      </div>

      <div class="type__categories">
        <input type="date">
        <h3>
          Descrizione:
        </h3>
        <input type="text">
      </div>

      <div class="type__amount">
        <p>€ {current}</p>
        <div class="button_keypad">&plus;</div>
      </div>
  </div>

  <div class="calculator">
      <div class="calculator__number" on:click={getValue}>1</div>
      <div class="calculator__number" on:click={getValue}>2</div>
      <div class="calculator__number" on:click={getValue}>3</div>
      <div class="calculator__number" on:click={getValue}>4</div>
      <div class="calculator__number" on:click={getValue}>5</div>
      <div class="calculator__number" on:click={getValue}>6</div>
      <div class="calculator__number" on:click={getValue}>7</div>
      <div class="calculator__number" on:click={getValue}>8</div>
      <div class="calculator__number" on:click={getValue}>9</div>
      <div class="calculator__number" on:click={getValue} data-action="decimal">.</div>
      <div class="calculator__number" on:click={getValue}>0</div>
      <div class="calculator__cancel" on:click={getValue}  data-action="clear"><span class="material-icons">backspace</span></div>
  </div>
</div>

<style>

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

.type {
  display: grid;
  grid-template-rows: repeat(3, min-content);
  justify-items: center;
  align-items: center;
  padding: 0 2.4rem;
  grid-gap: 2rem;
  margin: 2rem 0;
}

[type="date"] {
  margin-bottom: 1rem;
  width: 40vw;
  height: 20px;
  padding: 15px 5px;
  font-size: .9rem;
  border-radius: 0.8rem;
  border: var(--greyDark) 0.2px solid;
  color: var(--greyDark);
  box-shadow: 0px 6px 14px rgb(99 85 155 / 40%);
}

.type__tab {
  display: flex;
  width: 80%;
  background: var(--greyLight-1);
  border-radius: 0.6rem;
  position: relative;
  font-size: 1.2rem;
}
.type__tab input {
  display: none;
}
.type__tab label {
  padding: 0.8rem 0;
  z-index: 300;
  cursor: pointer;
  width: 50%;
  text-align: center;
  transition: all 0.3s ease;
}

.type__tab label:hover {
  color: var(--primary);
}

.type__tab > input:checked + label {
  color: var(--white);
}

.type__tab #tab-1:checked ~ .type__color {
  transform: translateX(0%);
  transition: all 0.5s ease;
}

.type__tab #tab-2:checked ~ .type__color {
  transform: translateX(100%);
  transition: all 0.5s ease;
}

.type__color {
  background: var(--primary);
  height: 100%;
  left: 0;
  width: 50%;
  position: absolute;
  border-radius: 0.6rem;
  z-index: 200;
}

.type__categories {
  grid-row: 2/3;
  width: 100%;
}

[type="text"] {
  width: 100%;
  height: 50px;
}

h3 {
  font-size: 1rem;
}

.type__amount {
  grid-row: 3/4;
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  border-bottom: 1px solid var(--greyLight-1);
  padding-bottom: .4rem;
}

.type__amount p {
  font-size: 2.5rem;
}

.calculator {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  justify-items: center;
  align-items: center;
  padding: 4rem 2.4rem;
  margin-top: 1rem;
}

.calculator__number {
  height: 5rem;
  width: 5rem;
  font-size: 2rem;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
}

.calculator__number:hover {
  color: var(--primary);
}

.calculator__cancel {
  color: var(--greyLight-3);
  cursor: pointer;
}
.calculator__cancel:hover {
  color: var(--primary);
}

.button_keypad {
  height: 40px;
  width: 40px;
  font-size: 1.7rem;
  background: var(--greyDark);
  display: flex;
  justify-content: center;
  color: var(--white);
  border-radius: 50%;
  box-shadow: 0px 6px 14px rgba(99, 85, 155, 0.4);
  cursor: pointer;
}

#button_back {
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
  cursor: pointer;
}
</style>