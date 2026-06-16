export default function LeftSidebar() {
    const exploreItems = [
        "Learning",
        "Insights",
        "Find Friends",
        "Bookmarks",
        "Group",
        "Gaming",
        "Settings",
        "Save Post",
    ];

    const suggestedPeople = [
        {
            name: "Steve Jobs",
            role: "CEO of Apple",
            image: "/assets/images/people1.png",
        },
        {
            name: "Ryan Roslansky",
            role: "CEO of Linkedin",
            image: "/assets/images/people2.png",
        },
        {
            name: "Dylan Field",
            role: "CEO of Figma",
            image: "/assets/images/people3.png",
        },
    ];

    return (
        <div className="col-xl-3 col-lg-3 col-md-12 col-sm-12">
            <div className="_layout_left_sidebar_wrap">

                {/* Explore */}

                <div className="_layout_left_sidebar_inner">
                    <div className="_left_inner_area_explore _padd_t24 _padd_b6 _padd_r24 _padd_l24 _b_radious6 _feed_inner_area">

                        <h4 className="_left_inner_area_explore_title _title5 _mar_b24">
                            Explore
                        </h4>

                        <ul className="_left_inner_area_explore_list">

                            {exploreItems.map((item) => (
                                <li
                                    key={item}
                                    className="_left_inner_area_explore_item"
                                >
                                    <a
                                        href="#"
                                        className="_left_inner_area_explore_link"
                                    >
                                        {item}
                                    </a>
                                </li>
                            ))}

                        </ul>

                    </div>
                </div>

                {/* Suggested People */}

                <div className="_layout_left_sidebar_inner">

                    <div className="_left_inner_area_suggest _padd_t24 _padd_b6 _padd_r24 _padd_l24 _b_radious6 _feed_inner_area">

                        <div className="_left_inner_area_suggest_content _mar_b24">

                            <h4 className="_left_inner_area_suggest_content_title _title5">
                                Suggested People
                            </h4>

                            <span className="_left_inner_area_suggest_content_txt">
                                <a
                                    href="#"
                                    className="_left_inner_area_suggest_content_txt_link"
                                >
                                    See All
                                </a>
                            </span>

                        </div>

                        {suggestedPeople.map((person) => (
                            <div
                                key={person.name}
                                className="_left_inner_area_suggest_info"
                            >

                                <div className="_left_inner_area_suggest_info_box">

                                    <div className="_left_inner_area_suggest_info_image">

                                        <img
                                            src={person.image}
                                            alt={person.name}
                                            className="_info_img"
                                        />

                                    </div>

                                    <div className="_left_inner_area_suggest_info_txt">

                                        <h4 className="_left_inner_area_suggest_info_title">
                                            {person.name}
                                        </h4>

                                        <p className="_left_inner_area_suggest_info_para">
                                            {person.role}
                                        </p>

                                    </div>

                                </div>

                                <div className="_left_inner_area_suggest_info_link">
                                    <a
                                        href="#"
                                        className="_info_link"
                                    >
                                        Connect
                                    </a>
                                </div>

                            </div>
                        ))}

                    </div>

                </div>

                {/* Events */}

                <div className="_layout_left_sidebar_inner">

                    <div className="_left_inner_area_event _padd_t24 _padd_b6 _padd_r24 _padd_l24 _b_radious6 _feed_inner_area">

                        <div className="_left_inner_event_content">

                            <h4 className="_left_inner_event_title _title5">
                                Events
                            </h4>

                            <a
                                href="#"
                                className="_left_inner_event_link"
                            >
                                See all
                            </a>

                        </div>

                        {[1, 2].map((event) => (
                            <div
                                key={event}
                                className="_left_inner_event_card"
                            >

                                <div className="_left_inner_event_card_iamge">

                                    <img
                                        src="/assets/images/feed_event1.png"
                                        alt=""
                                        className="_card_img"
                                    />

                                </div>

                                <div className="_left_inner_event_card_content">

                                    <div className="_left_inner_card_date">

                                        <p className="_left_inner_card_date_para">
                                            10
                                        </p>

                                        <p className="_left_inner_card_date_para1">
                                            Jul
                                        </p>

                                    </div>

                                    <div className="_left_inner_card_txt">

                                        <h4 className="_left_inner_event_card_title">
                                            No more terrorism no more cry
                                        </h4>

                                    </div>

                                </div>

                                <hr className="_underline" />

                                <div className="_left_inner_event_bottom">

                                    <p className="_left_iner_event_bottom">
                                        17 People Going
                                    </p>

                                    <a
                                        href="#"
                                        className="_left_iner_event_bottom_link"
                                    >
                                        Going
                                    </a>

                                </div>

                            </div>
                        ))}

                    </div>

                </div>

            </div>
        </div>
    );
}