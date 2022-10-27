<h2>termék hozzáadása</h2>

<form action="new-product" method="post">

    {{ csrf_field() }}

    <p>
        <label for="name">Név:</label>
        <input type="text" name="name">
    </p>
    <p>
        <label for="price">Ár:</label>
        <input type="number" name="price">
    </p>
    <p>
        <label for="type">Típus:</label>
        <input type="text" name="type_id">
    </p>
    <p>
        <button type="submit">Hozzáad</button>
    </p>
    
</form>

<!-- // vizsgald hogy letezik e a bevitt type es
        // mikor, az uj rekord feltoltes utani atiranyitas utan
        // bovitjuk a tipus dropdownt -->

<h2>típus hozzáadása</h2>

<form action="new-type">
    <p>
        <label for="type">Típus:</label>
        <input type="text">
    </p>
</form>