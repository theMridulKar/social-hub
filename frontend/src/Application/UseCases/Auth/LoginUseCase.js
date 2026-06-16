export default class LoginUseCase {
    constructor(authRepository) {
        this.authRepository = authRepository;
    }

    async execute(loginDTO) {
        return await this.authRepository.login(loginDTO);
    }
}