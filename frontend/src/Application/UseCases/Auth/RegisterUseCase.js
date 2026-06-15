export default class RegisterUseCase {
    constructor(authRepository) {
        this.authRepository = authRepository;
    }

    async execute(registerDTO) {
        return await this.authRepository.register(registerDTO);
    }
}