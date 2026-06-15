export default class RegisterDTO {
    constructor(firstName, lastName, email, password) {
        this.first_name = firstName;
        this.last_name = lastName;
        this.email = email;
        this.password = password;
    }

    toJSON() {
        return {
            first_name: this.first_name,
            last_name: this.last_name,
            email: this.email,
            password: this.password,
        };
    }
}