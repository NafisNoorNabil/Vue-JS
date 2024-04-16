<template>
  <div class="book">
    <h1>List of Books</h1>
    <ul>
      <li v-for="(book, index) in books" :key="index">
        <h2>{{ book.title }}</h2>
        <img :src="require(`@/assets/images/${book.imageFileName}`)" :alt="book.title" style="max-width: 200px;">
        <p>{{ book.description }}</p>
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
          title: 'Book 1', 
          description: 'Description of Book 1',
          imageFileName: 'hp1.jpg'
        },
        { 
          title: 'Book 2', 
          description: 'Description of Book 2',
          imageFileName: 'hp2.jpg'
        },
        { 
          title: 'Book 3', 
          description: 'Description of Book 3',
          imageFileName: 'dune.jpg'
        },
        { 
          title: 'Book 4', 
          description: 'Description of Book 4',
          imageFileName: 'got.jpg'
        }
        // Add more books as needed
      ]
    };
  }
};
</script>


<style>
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

</style>