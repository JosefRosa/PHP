Úložiště založené na technologii blockchain.

  Tento program implementuje vlastní úložiště založené na technologii blockchain. Každý blok řetězu se podepisuje pomocí hash funkce, na jejímž vstupu jsou data podepisovaného bloku a podpis bloku předchozího.

Použití:

  Program pracuje s úložištěm pomocí třídy Chain, která implementuje rozhraní IChain. Úložiště se skládá z řetězce bloků, každý blok je reprezentován instancí třídy Block. Třída Block obsahuje minimálně atributy id, dttm (datum a čas uzavření bloku a podpisu), hash a nějaký content.
