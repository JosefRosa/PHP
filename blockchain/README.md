#Úložiště založené na technologii blockchain.

  Tento program implementuje vlastní úložiště založené na technologii blockchain. Každý blok řetězu se podepisuje pomocí hash funkce, na jejímž vstupu jsou data podepisovaného bloku a podpis bloku předchozího.

Použití:

  Program pracuje s úložištěm pomocí třídy Chain, která implementuje rozhraní IChain. Úložiště se skládá z řetězce bloků, každý blok je reprezentován instancí třídy Block. Třída Block obsahuje minimálně atributy id, dttm (datum a čas uzavření bloku a podpisu), hash a nějaký content.
  
![chain uml](https://user-images.githubusercontent.com/76937639/236701484-77907228-71d5-4a9e-8f7f-9a5c4e9d9e3e.png)


Rozhraní IChain

IChain je rozhraní, které definuje základní operace, které úložiště musí podporovat:

     -addBlock(Block $block): static - přidá nový blok do řetězu

    -getBlock(int $id): ?Block - vrátí blok s daným ID, nebo null, pokud blok neexistuje

    -getLastBlock(): ?Block - vrátí poslední blok v řetězu, nebo null, pokud řetěz neobsahuje žádné bloky

     -isValid(): bool - ověří platnost celého řetězu bloků, tedy zda každý blok je podepsán svým předchůdcem a zda nedošlo k manipulaci s bloky

Třída Block

Třída Block reprezentuje jeden blok v řetězu. Obsahuje následující atributy:

1.id - identifikátor bloku

2.dttm - datum a čas uzavření bloku a podpisu

3.hash - podpis bloku, vypočítaný pomocí hash funkce

4.content - libovolné data, která jsou součástí bloku
