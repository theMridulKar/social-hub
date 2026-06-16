export default function MobileBottomNavigation() {

    return (
        <div
            className="_mobile_navigation_bottom_wrapper"
        >

            <div
                className="_mobile_navigation_bottom_wrap"
            >

                <ul
                    className="_mobile_navigation_bottom_list"
                >

                    <li
                        className="_mobile_navigation_bottom_item"
                    >
                        <a
                            href="/feed"
                            className="_mobile_navigation_bottom_link"
                        >
                            Home
                        </a>
                    </li>

                    <li
                        className="_mobile_navigation_bottom_item"
                    >
                        <a
                            href="#"
                            className="_mobile_navigation_bottom_link"
                        >
                            Friends
                        </a>
                    </li>

                    <li
                        className="_mobile_navigation_bottom_item"
                    >
                        <a
                            href="#"
                            className="_mobile_navigation_bottom_link"
                        >
                            Notifications
                        </a>
                    </li>

                    <li
                        className="_mobile_navigation_bottom_item"
                    >
                        <a
                            href="#"
                            className="_mobile_navigation_bottom_link"
                        >
                            Chat
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    );
}