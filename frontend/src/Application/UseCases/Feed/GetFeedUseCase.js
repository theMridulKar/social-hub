export default class GetFeedUseCase {
    constructor(feedRepository) {
        this.feedRepository = feedRepository;
    }

    async execute() {
        return await this.feedRepository.getFeed();
    }
}