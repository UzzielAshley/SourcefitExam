
<template>
  <div class="col-md-12">
    <h1>Edit Employee</h1>
    <form @submit.prevent="updatePost">
      <div class="row">
                <div class="col-md-6">
            <div class="form-group">
              <label>Employee Name</label>
              <input type="text" class="form-control" v-model="profile.name">
            </div>
          </div>
          </div><br />
          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Employee Address</label>
              <input type="text" class="form-control" v-model="profile.address">
            </div>
          </div>
          </div><br />
          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Employee Contact Number</label>
              <input type="text" class="form-control" v-model="profile.contact">
            </div>
          </div>
          </div><br />
           <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Employee Email</label>
              <input type="text" class="form-control" v-model="profile.email">
            </div>
          </div>
          </div><br />
           <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Employee Birthday</label>
              <input type="text" class="form-control" v-model="profile.birthdate">
            </div>
          </div>
          </div><br/>
        <div class="form-group">
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {

      data() {
        return {
          profile: {}
        }
      },
      created() {
        let uri = `/api/profile/edit/${this.$route.params.id}`;
        axios.get(uri).then((response) => {
            this.profile = response.data;
        });
      },
      methods: {
        updatePost() {
          let uri = `/api/profile/update/${this.$route.params.id}`;
          axios.post(uri, this.profile).then((response) => {
            this.$router.push({name: 'profiles'});
          });
        }
      }
    }
</script>