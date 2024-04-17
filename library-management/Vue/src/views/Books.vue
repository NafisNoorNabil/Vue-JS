<template>
  <div class="book">
    <h1>List of Books</h1>
    <ul>
      <li v-for="book in books" :key="book.id">
        <img :src="require(`@/assets/images/${book.imageFileName}`)" :alt="book.title" style="max-width: 200px;">
        <h3>{{ book.title }}</h3>
        <p>{{ book.price }}$</p>
        <button class="button-delete" @click="deleteBook(book.id)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'Books',
  data() {
    return {
      books: [
        { 
          title: 'Harry Potter and the Chamber of Secrets', 
          author:"J.K Rowling",
          description:"Harry returns to Hogwarts for his second year, only to find mysterious attacks threatening students. With the help of his friends Ron and Hermione, Harry uncovers a dark secret hidden within the school's history and confronts the ancient evil lurking in the Chamber of Secrets.",
          price: "20",
          imageFileName: 'hp1.jpg'
        },
        { 
          title: 'Harry Potter and the Deathly Hallows', 
          author:"J.K Rowling",
          description:"Harry, Ron, and Hermione embark on a dangerous quest to destroy Voldemort's remaining Horcruxes. As they face escalating threats from Death Eaters and the Dark Lord himself, they must rely on each other and their courage to fulfill their destiny and defeat the ultimate evil threatening the wizarding world.",
          price: "23",
          img: 'hp2.jpg'
        },
        { 
          title: 'Dune', 
          author:"Frank Herbert",
          description:"Dune is a sweeping science fiction epic set in a distant future where noble houses vie for control of the desert planet Arrakis, the only source of the universe's most valuable substance, spice. It follows young Paul Atreides as he navigates political intrigue, religious prophecy, and personal transformation, ultimately becoming a pivotal figure in shaping the fate of humanity.",
          price: "25",
          img: 'dune.jpg'
        },
        { 
          title: 'The World of Ice and Fire', 
          author:"George R. R. Martin",
          description:"a gripping fantasy series by George R.R. Martin, set in the fictional continents of Westeros and Essos. Focused on power struggles among noble families, it weaves a complex narrative of political intrigue, war, and supernatural elements, with characters battling for the Iron Throne while an ancient threat looms beyond the Wall in the icy North.",
          price: "30",
          img: 'got.jpg'
        }
      ]
    };
  },
  methods: {
    deleteBook(bookId) {
      // Implement deleting logic here
      this.books = this.books.filter(book => book.id !== bookId);
      console.log("Deleting book with ID:", bookId);
    }
  }
}
</script>
<style scoped>


.book {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;

}

.book h1 {
  text-align: center;
}

.book ul {
  list-style-type: none;
  padding: 0;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  margin-top:50px;
}

.book li {
  margin: 10px;
  flex: 1 0 200px; /* Each book item will have a flex basis of 200px, can grow, but not shrink */
}

.book img {
  display: block;
  width: 100%; /* Make the image fill its container */
  height: auto; /* Maintain aspect ratio */
}

.book h2 {
  margin-bottom: 5px;
}

.book p {
  margin-top: 5px;
  font-size: 16px;
  line-height: 1.5;
}

body{
  font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

}

.button-add-to-cart {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 4px;
}

.button-add-to-cart:hover{
  background-color: #1a6b1d; 
}
</style>