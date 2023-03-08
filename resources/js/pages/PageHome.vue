<template>
  <div class="container_section">
    <div class="section_nav">
      <h2>I piatti che ami, a domicilio</h2>
      <div class="hash">#aCasaTuaConDeliveBoo</div>
    </div>
    <div class="container py-3">
      <div class="container">
        <div class="d-flex justify-content-center py-4">
          <select
            class="form-select filter"
            v-if="types"
            name="type"
            id="type"
            v-model="value"
            @change="filterRestaurant(value)"
          >
            <option value="all" selected>Tutti</option>
            <option v-for="typex in types" :key="typex.id" :value="typex.id">
              {{ typex.name }}
            </option>
          </select>
        </div>
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row_cards">
          <router-link
            :to="{ name: 'dishes', params: { id: user.id, slug: user.slug } }"
            class="p-3 w-75 m-auto d-flex"
            v-for="user in users"
            :key="user.id"
          >
            <div class="card card-ristoranti bg-opacity-25 col">
              <div class="w-100 h-75 m-auto">
                <img
                  :src="user.image_logo"
                  class="card-img-top h-100 w-100"
                  alt="..."
                />
              </div>
              <div class="card-body text-center">
                <h2 class="card-text text-dark">{{ user.name }}</h2>
              </div>
            </div>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: null,
      types: null,
      value: "",
    };
  },
  methods: {
    filterRestaurant(typeId) {
      if (typeId !== "all") {
        axios.get(`/api/filter/${typeId}`).then((response) => {
          if (response.data.success) {
            this.users = response.data.results;
          }
        });
      } else {
        axios.get("/api/").then((response) => {
          if (response.data.success) {
            this.users = response.data.results;
            this.types = response.data.types;
          } else {
            this.users = "non va un cazzo";
          }
        });
      }
    },
  },
  created() {
    axios.get("/api/").then((response) => {
      if (response.data.success) {
        this.users = response.data.results;
        this.types = response.data.types;
      } else {
        this.users = "non va un cazzo";
      }
    });
  },
};
</script>

<style lang="scss" scoped>
.container_section {
  background-color: rgba(92, 201, 188, 1);
}
.container {
  background-color: rgba(92, 201, 188, 1);
}
.card,
.col {
  padding-left: 0 !important;
  padding-right: 0 !important;
}
a {
  text-decoration: none;
  margin: 0 !important;
}
.card-ristoranti {
  height: 20rem;
  border-radius: 2rem;
  box-shadow: 10px 10px 5px #424242;
  transition: 1s;
}
.card-ristoranti:hover {
  transform: scale(1.1);
}

.card {
  border: none;
  width: 300px;
  justify-content: space-between;
  background-color: white;
}
.card-img-top {
  border-radius: 2rem 2rem 0 0;
  background-color: white;
}
.section_nav {
  position: relative;
  height: 35rem;
  background-color: rgba(54, 124, 136, 1);
  display: flex;
  align-items: center;
  background-image: url(https://www.informacibo.it/wp-content/uploads/2020/04/delivery.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  h2 {
    padding: 2rem;
    font-style: oblique;
    font-size: xx-large;
    color: rgba(213, 234, 162, 1);
  }

  .hash {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: rgba(54, 124, 136, 1);
    padding: 4rem;
    font-weight: bolder;
    color: white;
    font-size: 40px;
    border-top-left-radius: 80%;
  }

  @media (max-width: 660px) {
    .hash {
      font-size: 20px;
    }
  }
}
.filter {
  z-index: 1;
  width: 10%;
  border: 2px solid #5cc9bc;
  border-radius: 10px;
  padding: 0.5rem;
  text-align: center;
}
@media (max-width: 575px) {
  .row_cards {
    justify-content: center;
  }
}
</style>
