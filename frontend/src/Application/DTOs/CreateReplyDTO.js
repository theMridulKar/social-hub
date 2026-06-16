export default class CreateReplyDTO {

    constructor(
        commentId,
        content
    ) {
        this.commentId =
            commentId;

        this.content =
            content;
    }
}