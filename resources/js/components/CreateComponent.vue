<template>
  <div class="col-md-12">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h1>Create Employee Profile</h1>
      <form @submit.prevent="addPost">
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
          </div><br />
          <div class="form-group">
            <button class="btn btn-primary"><span class="fa fa-plus"></span> Save</button>
          </div>
      </form>
    </div>
    <div class="col-md-2"></div>  
  </div>

</template>

<script>
    export default {
        data(){
        return {
          profile:{},
          
        }
    },
    methods: {
        addPost() {
            // console.log(this.post)
            // let uri = 'http://localhost:8000/api/post/store';
            axios.post('/api/profile/create', this.profile).then((response) => {
               this.$router.push({name: 'profiles'});
            });
            swal('Successfuly!', 'Added Succesfully', 'success');
        },

    }
  }
</script>