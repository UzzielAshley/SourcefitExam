<template>
  <div class="col-md-12">
      <h1>Employee Profile</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'create' }" class="btn btn-primary">Create Post</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Birthdate</th>
                <th colspan="2"><center>Actions</center></th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="profile in profiles" :key="profile.id">
                    <td>{{ profile.id }}</td>
                    <td>{{ profile.name }}</td>
                    <td>{{ profile.address }}</td>
                    <td>{{ profile.contact }}</td>
                    <td>{{ profile.email }}</td>
                    <td>{{ profile.birthdate }}</td>
                    <td class="center"><button class="btn btn-success" @click.prevent="show(profile.id)"><span class="fa fa-eye"></span> Show</button> <router-link :to="{name: 'edit', params: { id: profile.id }}" class="btn btn-primary"><span class="fa fa-edit"></span> Edit</router-link> <button class="btn btn-danger" @click.prevent="deletePost(profile.id)"> <span class="fa fa-trash"></span> Delete</button></td>
                </tr>
            </tbody>
        </table>
        <!-- modal -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Employee Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Employee Name</label>
              <input type="text" class="form-control" v-model="profile.name" readonly>
            </div>
          </div>
          </div><br />
          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Employee Address</label>
              <input type="text" class="form-control" v-model="profile.address" readonly>
            </div>
          </div>
          </div><br />
          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Employee Contact Number</label>
              <input type="text" class="form-control" v-model="profile.contact" readonly>
            </div>
          </div>
          </div><br />
           <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Employee Email</label>
              <input type="text" class="form-control" v-model="profile.email" readonly>
            </div>
          </div>
          </div><br />
           <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Employee Birthday</label>
              <input type="text" class="form-control" v-model="profile.birthdate" readonly>
            </div>
          </div>
          </div><br />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- modal end -->
  </div>
</template>

<script>
  export default {
     mounted() {
      this.load()
    },
      data() {
        return {
          profile:[],
          profiles: []
        }
      },
      created() {
      
    },
    methods: {
      load(){
        let uri = '/api/profiles';
        axios.get(uri).then(response => {
          this.profiles = response.data.data;
        });
      },
      deletePost(id) {
        swal({
          title:"Are you sure?",
          text:"Profile will be delete",
          icon:"warning",
          buttons: true,
          dangerMode: true
        }).then((willdelete)=>{
            if(willdelete){
              let uri = `/api/profile/delete/${id}`;
              axios.delete(uri).then(response => {
                this.profile.splice(this.profile.indexOf(id), 1);
              });
              swal('Successfuly!', 'Profile has been added!', 'success');
              this.load();

            }
        })


      },
      show(id){
        let uri = `/api/show/${id}`;
        axios.get(uri).then(response =>{
          this.profile = response.data;
        })
        $('#showModal').modal('show');
      }
    }
  }
</script>