export default class CreateReplyUseCase {

    constructor(
        replyRepository
    ) {
        this.replyRepository =
            replyRepository;
    }

    async execute(dto) {

        return await this
            .replyRepository
            .createReply(
                dto.commentId,
                {
                    content:
                        dto.content,
                }
            );
    }
}