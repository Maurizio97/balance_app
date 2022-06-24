<script>
    // export let pippo;
</script>

<ul>
  <li class="transaction">
      <div class="transaction__type">
          <span class="date">22/06</span>
          <div class="description">
          <h4>Description:</h4>
          <p>Spesa al conad aaaaaaa aaaaa aaa aaaa aaaa aaaaa aaaaa aaa fhudskfb hbdjkfgkdfgdkfhbsfhdsk</p>
          </div>
      </div>
      <div class="transaction__price">
          <h5 style="color: #ff6fb7">- 10000</h5>
          <button class="transaction__bin">
          <span class="material-icons">&#128465;</span>
          </button>
      </div>
  </li>
  <li class="transaction">
      <div class="transaction__type">
          <span class="date">22/06</span>
          <div class="description">
          <h4>Description:</h4>
          <p>Spesaaaaaaa</p>
          </div>
      </div>
      <div class="transaction__price">
          <h5 style="color: #a9e61c">+ 10000</h5>
          <button class="transaction__bin">
          <span class="material-icons">&#128465;</span>
          </button>
      </div>
  </li>
  <li class="transaction">
      <div class="transaction__type">
          <span class="date">22/06</span>
          <div class="description">
          <h4>Description:</h4>
          <p>Spesa al conad aaaaaaa aaaaa aaa aaaa aaaa aaaaa aaaaa aaa fhudskfb hbdjkfgkdfgdkfhbsfhdsk</p>
          </div>
      </div>
      <div class="transaction__price">
          <h5 style="color: #ff6fb7">- 10000</h5>
          <button class="transaction__bin">
          <span class="material-icons">&#128465;</span>
          </button>
      </div>
  </li>
  <li class="transaction">
      <div class="transaction__type">
          <span class="date">22/06</span>
          <div class="description">
          <h4>Description:</h4>
          <p>Spesa al conad aaaaaaa aaaaa aaa aaaa aaaa aaaaa aaaaa aaa fhudskfb hbdjkfgkdfgdkfhbsfhdsk</p>
          </div>
      </div>
      <div class="transaction__price">
          <h5 style="color: #a9e61c">+ 10000</h5>
          <button class="transaction__bin">
          <span class="material-icons">&#128465;</span>
          </button>
      </div>
  </li>
  <li class="transaction">
      <div class="transaction__type">
          <span class="date">22/06</span>
          <div class="description">
          <h4>Description:</h4>
          <p>Spesa al conad aaaaaaa aaaaa aaa aaaa aaaa aaaaa aaaaa aaa fhudskfb hbdjkfgkdfgdkfhbsfhdsk</p>
          </div>
      </div>
      <div class="transaction__price">
          <h5 style="color: #a9e61c">+ 10000</h5>
          <button class="transaction__bin">
          <span class="material-icons">&#128465;</span>
          </button>
      </div>
  </li>
</ul>

<style>
  .container button {
    outline: none;
    border: none;
    background: none;
    cursor: pointer;
  }
  .balance__details ul {
    padding-right: 10px;
    overflow: auto;
  }

  .transaction {
    display: flex;
    justify-content: space-between;
    padding: 0.8rem 0;
    cursor: pointer;
    font-weight: 700;
  }
  .transaction:hover > .transaction__price > button {
    color: var(--greyDark);
  }
  .transaction__type, .transaction__price {
    display: flex;
    align-items: center;
  }

  .transaction__price {
    max-width: 40%;
  }
  .transaction__type {
    flex-direction: column;
    max-width: 60%;
  }

  .transaction__type h4 {
    font-size: .8rem;
  }
  .transaction__type p {
    font-size: .7rem;
    color: var(--greyLight-4);
  }

  /* .description {

  } */

  .date {
    font-size: 1rem;
    align-self: flex-start;
  }
  .transaction__price h5 {
    margin: 0.8rem 1rem;
    font-size: 1rem;
  }
  /* .transaction__type button, .transaction__price button {
    color: var(--greyLight-3);
    display: flex;
  } */

  /* .transaction li {
    display: flex;
    justify-content: space-between;
    margin: 1.4rem 0;
  } */
</style>