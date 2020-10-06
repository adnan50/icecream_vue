<template>
<v-app>
    <?php
      $user_role = get_user_role();
      if ($user_role == "teacher") 
      {
         echo $this->lang->line('teachers_portal');

      }
      elseif ($user_role == "student") 
      {
          
          echo $this->lang->line('student_portal');
      }
      elseif ($user_role == "admin") 
      {
          
          echo $this->lang->line('admin_portal');
      }
      ?>
    <v-app-bar
      app
      color="primary"
      dark
    >
      <div class="d-flex align-center">
<a href="<?php echo base_url('users/dashboards'); ?>">
        <v-img
          alt="Icecream Logo"
          class="shrink mr-2"
          contain
          src='<?php echo base_url() ?>assets/layouts/layout5/img/logo.png'
          transition="scale-transition"
          width="100"
        />
</a>
        
      </div>

      <v-spacer></v-spacer>


      <v-menu
        bottom
        min-width="200px"
        rounded
        offset-y
      >
        <template v-slot:activator="{ on }">
          <v-btn
            icon
            
            v-on="on"
          >
            <v-avatar
              color="brown"
              size="55"
            >
              <span class="white--text custom_avatar_text br50 font-11"><?php $name = get_user_name(); echo $name; ?></span>
            </v-avatar>
          </v-btn>
        </template>
        <v-card>
          <v-list-item-content class="justify-center">
            <div class="mx-auto text-center">
              <v-avatar
                color="brown"
              >
                <span class="white--text custom_avatar_text br50"><?php $name = get_user_name(); echo $name; ?></span>
              </v-avatar>
              <!-- <h3>Adnan</h3> -->
              <p class="caption mt-1">
                Hi, <?php $name = get_user_name(); echo $name; ?>
              </p>
              <v-divider class="my-3"></v-divider>
              <v-btn
              href="<?php echo base_url('users/manage_user_view/'.get_user_role().'?id='.get_user_id()) ?>"
                depressed
                rounded
                text
              >
                <?php echo $this->lang->line('myprofile'); ?>
              </v-btn>
              <v-divider class="my-3"></v-divider>
              <v-btn
              href="<?php echo base_url('Logout/logout') ?>"
                depressed
                rounded
                text
              >
                <?php echo $this->lang->line('logout'); ?>
              </v-btn>
            </div>
          </v-list-item-content>
        </v-card>
      </v-menu>
    </v-app-bar>
    <v-main class="pt45"> 
          <v-row>
    <v-col cols="2" class="pt-0 pb-0">
      <v-card
        height="91.5vh"
        width="256"
        class="mx-auto position-fixed"

      >
        <v-navigation-drawer permanent>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="title">
                Admin Portal
              </v-list-item-title>
            
            </v-list-item-content>
          </v-list-item>

          <v-divider class="mt-0"></v-divider>

          <v-list
            dense
            nav
          >
          <!-- teacher role -->
           <?php                                
            if ($user_role == "teacher") {
                ?>
            <v-list-item
              v-for="teacher in teachers"
              :key="teacher.title"
              v-on:click="teacher.href"
            >
              <v-list-item-icon>
                <v-icon>{{ teacher.icon }}</v-icon>
              </v-list-item-icon>

              <v-list-item-content>
                <v-list-item-title>{{ teacher.title }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
                <?php
                }elseif ($user_role == "student") {
                    ?>
              <v-list-item
              v-for="student in students"
              :key="student.title"
              link="student.href"
            >
              <v-list-item-icon>
                <v-icon>{{ student.icon }}</v-icon>
              </v-list-item-icon>

              <v-list-item-content>
                <v-list-item-title>{{ student.title }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
              <?php
              }elseif ($user_role == "admin") {
                  ?>
               <a href="@{{admin.action}}">
              <v-list-item
              v-for="admin in admins"
              :key="admin.title"
               

            >

              <v-list-item-icon>
                <v-icon>{{ admin.icon }}</v-icon>
              </v-list-item-icon>

              <v-list-item-content>
                <v-list-item-title>{{ admin.title }} </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </a>
            <?php
            }
            ?>
          </v-list>
        </v-navigation-drawer>
      </v-card>
    </v-col>
     <v-col cols="10">
      <r-row>
        <v-col cols="12">
          <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>Availability
                                    <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.</div>
                                </div>
                            </div>
                        </div>
                    </div>
        </v-col>
      </r-row>
 

           

