<script setup>
import navigation from '@/layouts/navigation_employer.vue';
import { onMounted,ref , computed} from 'vue';
import axios from 'axios';
import { useRouter } from "vue-router";
const router = useRouter();

let old_password=ref('');
let new_password=ref('');
let confirm_new_password=ref('');
let checker_message=ref('');
let checker_message2=ref('');
let confirm_password_message=ref('');
let isPasswordCorrect = ref(false);
let isPasswordIncorrect = ref(false);

const showCurrentPassword = ref(false);
const showNewPassword = ref(false);
const showConfirmPassword = ref(false);

const toggleCurrentPassword = () => {
    showCurrentPassword.value = !showCurrentPassword.value
}
const toggleNewPassword = () => {
    showNewPassword.value = !showNewPassword.value
}
const toggleConfirmPassword = () => {
    showConfirmPassword.value = !showConfirmPassword.value
}
const PasswordChecker = async () => {
    // try {
    let response = await axios.get(`/api/check_employer_password/${old_password.value}`);
    if (response.data.exists === false) {
        checker_message.value = 'You have entered the wrong password!';
        isPasswordCorrect.value = false;
        isPasswordIncorrect.value = true;
        document.getElementById("newpass").disabled = true;
        document.getElementById("confirmnewpass").disabled = true;
    } else {
        checker_message.value = '';
        isPasswordCorrect.value = true;
        isPasswordIncorrect.value = false;
        document.getElementById("newpass").disabled = false;
        document.getElementById("confirmnewpass").disabled = false;
    }
    // } catch (error) {
    //     console.error("Error checking password:", error);
    // }
};
// const PasswordChecker = async () => {
//     let response = await axios.get('/api/check_employer_password/'+old_password.value)

//     if (response.data.exists === false) {
//         checker_message.value = 'You have entered the wrong password!';
//         document.getElementById("newpass").disabled = true;
//         document.getElementById("confirmnewpass").disabled = true;
//     } else {
//         checker_message.value = '';
//         document.getElementById("newpass").disabled = false;
//         document.getElementById("confirmnewpass").disabled = false;
//     }
// }
    const passwordsMatch = computed(() => new_password.value === confirm_new_password.value && new_password.value !== '');
    const passwordsDoNotMatch = computed(() => new_password.value !== confirm_new_password.value && confirm_new_password.value !== '');

    // Method to check password match
    const ConfirmNewPassword = () => {
        if (passwordsMatch.value) {
            checker_message2.value = '✅ Passwords match!';
            document.getElementById("btn").disabled = false;

            setTimeout(() => {
                checker_message.value = ''; // Clear the message
            }, 3000);
        } else {
            checker_message2.value = '❌ Passwords do not match.';
            document.getElementById("btn").disabled = true;
        }
    };
    // const ConfirmNewPasword = () => {
	// 	if (new_password.value === confirm_new_password.value) {
	// 		confirm_password_message.value = 'Passwords match!';
	// 		document.getElementById("btn").disabled = false;

	// 		setTimeout(function() {
	// 			confirm_password_message.value = ''; // Clear the message
	// 		}, 3000); // 3000 milliseconds = 3 seconds
	// 	} else {
	// 		confirm_password_message.value = 'Passwords do not match.';
    //         document.getElementById("btn").disabled = true;
	// 	}
	// }

    const ChangePassword = () => {
        const formData=new FormData()
        formData.append('password',new_password.value)
        axios.post('/api/change_password/',formData).then(function (response) {
            localStorage.removeItem('token')
            router.push('/')
        });
    }

</script>
<template>
	<navigation>
		<div class="hero-wrap hero-wrap-3">
            <div class="overlay"></div>
             <div class="container"></div>
		</div>
  
		<section class="ftco-section bg-light"> 
            <div class="container">
                <div class="row">
                    <!-- Settings Page -->
                    <div class="col-md-12 col-lg-8 mb-5">
                        <div class="p-5 bg-white">
                            <h4 class="mb-0">Settings</h4>
                            <p class="m-0">Manage your account settings.</p>
                            <hr>

                            <!-- Change Password -->
                            <h3>Change Password</h3>
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label class="font-weight-bold mb-0">Current Password:</label>
                                    <div class="relative">
                                        <input 
                                            :type="showCurrentPassword ? 'text' : 'password'" 
                                            class="form-control" 
                                            :class="{
                                                '!border-green-500': isPasswordCorrect, 
                                                '!border-red-500': isPasswordIncorrect
                                                }" 
                                            placeholder="Enter current password" 
                                            v-model="old_password" 
                                            @blur="PasswordChecker">
                                        <p v-if="checker_message" 
                                        :class="{
                                            '!text-green-500': isPasswordCorrect, 
                                            '!text-red-500': isPasswordIncorrect
                                        }" 
                                        class="text-sm mt-1 flex items-center mb-0" >
                                            {{ checker_message }}
                                        </p>
                                        <span class="toggle-password" @click="toggleCurrentPassword">
                                            <i :class="showCurrentPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="font-weight-bold mb-0">New Password:</label>
                                    <div class="relative">
                                    <input 
                                        :type="showNewPassword ? 'text' : 'password'" 
                                        class="form-control" 
                                        :class="{'!border-green-500': passwordsMatch, '!border-red-500': passwordsDoNotMatch}" 
                                        placeholder="Enter new password" 
                                        v-model="new_password" 
                                        id="newpass" 
                                        disabled
                                        >
                                        <span class="toggle-password" @click="toggleNewPassword">
                                            <i :class="showNewPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <label class="font-weight-bold mb-0">Confirm New Password:</label>
                                    <div class="relative">
                                        <input 
                                            :type="showConfirmPassword ? 'text' : 'password'"  
                                            class="form-control" 
                                            :class="{'!border-green-500': passwordsMatch, '!border-red-500': passwordsDoNotMatch}" 
                                            placeholder="Confirm new password" 
                                            v-model="confirm_new_password" 
                                            @input="ConfirmNewPassword()" 
                                            id="confirmnewpass" 
                                            disabled>
                                        <span class="toggle-password" @click="toggleConfirmPassword">
                                            <i :class="showConfirmPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
                                        </span>
                                        <p v-if="checker_message2" class="text-sm mt-1 flex items-center absolute" :style="{ color: passwordsMatch ? 'green' : 'red' }">
                                            {{ checker_message2 }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-primary mt-2" @click="ChangePassword()" disabled id="btn">Update Password</button>
                                </div>
                            </div>

                            <hr>
                            <!-- Notification Settings -->
                            <!-- <h3>Notification Preferences</h3>
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="emailNotifications">
                                        <label class="form-check-label" for="emailNotifications">Receive Email Notifications</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="smsNotifications">
                                        <label class="form-check-label" for="smsNotifications">Receive SMS Notifications</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <button class="btn btn-primary">Save Preferences</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">More Info</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur.</p>
                            <p><a href="#" class="btn btn-primary py-2 px-4">Learn More</a></p>
                        </div>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
        </section>
		
		<footer class="ftco-footer ftco-bg-blue">
		  <div class="container">
			  <div class="row mb-5">
				  <div class="col-md">
					  <div class="ftco-footer-widget mb-4">
						  <h2 class="ftco-heading-2">Skillhunt Jobboard</h2>
						  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						  <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
						  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
						  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
						  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
					  </ul>
					  </div>
				  </div>
			  </div>
		  </div>
		</footer>
	</navigation>
</template>
