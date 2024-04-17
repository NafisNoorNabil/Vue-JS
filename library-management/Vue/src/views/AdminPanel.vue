<template>
  <div>
    <h1>Add New Book</h1>
    <form @submit.prevent="addBook">
      <label>Title:</label>
      <input type="text" v-model="newBook.title" required>
      <label>Price:</label>
      <input type="number" v-model="newBook.price" required>
      <label>Image File Name:</label>
      <input type="text" v-model="newBook.imageFileName" required>
      <button type="submit">Add Book</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newBook: {
        title: '',
        price: '',
        imageFileName: ''
      }
    };
  },
  methods: {
    addBook() {
      // Emit an event to notify the parent component (App.vue) about the new book
      this.$emit('add-book', this.newBook);
      // Reset the form fields after adding the book
      this.newBook = {
        title: '',
        price: '',
        imageFileName: ''
      };
    }
  }
}
</script>
<style scoped> 
/* Style for the container div */
div {
  width: 300px;
  margin: 0 auto;
  text-align: center;
}

/* Style for the form */
form {
  margin-top: 20px;
}

/* Style for labels */
label {
  display: block;
  margin-top: 10px;
}

/* Style for input fields */
input {
  width: 100%;
  padding: 8px;
  margin-top: 5px;
  box-sizing: border-box;
}

/* Style for submit button */
button {
  width: 100%;
  padding: 10px;
  margin-top: 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Style for submit button on hover */
button:hover {
  background-color: #0056b3;
}

</style>
