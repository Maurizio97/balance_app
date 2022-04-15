<script>
	let total    = 0;
	let gain     = 0;
	let expenses = 0;
	let input    = null;

/* struttura dati da salvare nel local storage */
/* 	[
		"2022": {
			"03": {
				"15": [
					{
						"input": 10,
						"text": "spesa Conad",
						"time": "12:32:18"
					},
					{
						"input": 15,
						"time": "23:36:18"
					}
				],
				"16": [
					
				]
			},
			"04": {
				"15": [
					{
						"input": 10,
						"text": "spesa Conad",
						"time": "12:32:18"
					},
					{
						"input": 15,
						"time": "23:36:18"
					}
				],
				"16": [
					
				]
			}
		}
	] */

	
	
	function addValue(e) {
		if (e.charCode === 13 && input !== 0) {

			input > 0 ? expenses += input : gain += input;

			total = expenses + gain;
			input = null;
		}
	}
</script>

<main>
	<h1>Totale {total}</h1>
	<h1>Spese {gain}</h1>
	<h1>Guadagni {expenses}</h1>

	<div>
		<input type="number" bind:value={input} on:keypress={addValue}>
	</div>
</main>

<style>
</style>