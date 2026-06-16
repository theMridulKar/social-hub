export default class CreatePostUseCase {

    constructor(postRepository) {
        this.postRepository = postRepository;
    }

    async execute(dto) {
        return await this.postRepository.createPost(dto);
    }
}